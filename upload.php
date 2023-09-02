<?php
session_start();
include_once('cadastro/conexao.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Dados do formulário
    $nome = $_POST['nome'];
    $descricao = nl2br($_POST['descricao']);

    // Verifica se foi enviada uma imagem
    if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] === UPLOAD_ERR_OK) {
        $imagem_temporaria = $_FILES['imagem']['tmp_name'];
        $nome_imagem = $_FILES['imagem']['name'];
        $tipoArte = $_POST['tipo'];

        // Move a imagem para o diretório desejado (neste exemplo, o diretório 'uploads')
        $caminho_destino = 'uploads/' . $nome_imagem;
        move_uploaded_file($imagem_temporaria, $caminho_destino);
    } else {
        die("Erro ao enviar a imagem.");
    }

    $id_user = $_SESSION['id_usuario'];
    $sqlBuscarNick = "SELECT nick FROM users WHERE id = '$id_user'";
    $resultadoBuscaNick = $conexao->query($sqlBuscarNick);

    if ($resultadoBuscaNick->num_rows > 0) {
        $row = $resultadoBuscaNick->fetch_assoc();
        $nick_usuario = $row['nick'];
    } else {
        echo "<script>alert('Usuário não encontrado'); window.location.href = 'paginaPrincipal.php';</script>";
    }

    // Inicia a transação
    $conexao->begin_transaction();

    // Insere os dados do post na tabela de posts
    $sql = "INSERT INTO Posts (imagem, nome, tipoArt, descricao, id_user) VALUES ('$caminho_destino', '$nome', '$tipoArte', '$descricao', '$id_user')";

    if ($conexao->query($sql) === TRUE) {
        $newPostId = $conexao->insert_id;

        // Criação do chat associado ao post
        $sqlCriarChat = "INSERT INTO Chats (post_id) VALUES ('$newPostId')";
        if ($conexao->query($sqlCriarChat) === TRUE) {
            $chatId = $conexao->insert_id; // ID do novo chat criado

            // Inserir mensagens no chat
            $mensagem = "$nick_usuario fez uma nova postagem";
            $sqlInserirMensagem = "INSERT INTO Mensagens (MEN_POST_ID, MEN_USUARIO, MEN_CONTEUDO) VALUES ('$newPostId', 'usuário', '$mensagem')";
            if ($conexao->query($sqlInserirMensagem) === TRUE) {
                // Inserir notificações para seguidores
                $sqlSeguidores = "SELECT seguidor_id FROM seguidores WHERE seguindo_id = '$id_user'";
                $resultadoSeguidores = $conexao->query($sqlSeguidores);

                while ($row = $resultadoSeguidores->fetch_assoc()) {
                    $seguidor_id = $row['seguidor_id'];
                    $sqlInserirNotificacao = "INSERT INTO notifications (user_id, mensagem, data_criacao, lida) VALUES ('$seguidor_id', '$mensagem', NOW(), '0')";
                    $conexao->query($sqlInserirNotificacao);
                }

                // Commit a transação
                $conexao->commit();
                echo "<script>alert('Post cadastrado!'); window.location.href = 'paginaPrincipal.php';</script>";
            } else {
                // Rollback da transação em caso de erro
                $conexao->rollback();
                echo "<script>alert('Erro ao cadastrar mensagem'); window.location.href = 'paginaPrincipal.php';</script>";
            }
        } else {
            // Rollback da transação em caso de erro
            $conexao->rollback();
            echo "<script>alert('Erro ao criar chat'); window.location.href = 'paginaPrincipal.php';</script>";
        }
    } else {
        // Rollback da transação em caso de erro
        $conexao->rollback();
        echo "<script>alert('Erro ao cadastrar post'); window.location.href = 'paginaPrincipal.php';</script>";
    }

    // Fecha a conexão com o banco de dados
    $conexao->close();
}
?>
