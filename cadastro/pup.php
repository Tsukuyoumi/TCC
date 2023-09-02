<?php
session_start();
include_once('conexao.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $id = $_SESSION['id_usuario'];
    $bio = nl2br($_POST['bio']);
    $arte = $_POST['tipoArt'];

    if (isset($_FILES['perfil']) && isset($_FILES['back'])) { 

        $imagem_temporaria_perfil = $_FILES['perfil']['tmp_name'];
        $nome_imagem_perfil = $_FILES['perfil']['name'];
        $caminho_destino_perfil = 'fotosPerfil/' . $nome_imagem_perfil;

        $imagem_temporaria_back = $_FILES['back']['tmp_name'];
        $nome_imagem_back = $_FILES['back']['name'];
        $caminho_destino_back = 'fotosPerfil/' . $nome_imagem_back;

        if (!empty($bio) && !empty($arte) && move_uploaded_file($imagem_temporaria_perfil, $caminho_destino_perfil) && move_uploaded_file($imagem_temporaria_back, $caminho_destino_back)) {

            $result = mysqli_query($conexao, "UPDATE users SET bio='$bio', perfil='$caminho_destino_perfil', backFoto='$caminho_destino_back', tipoArt='$arte' WHERE id = $id");

            if ($result) {
                header('Location: ../users/user.php');
            } else {
                echo "<script> alert('Erro ao atualizar perfil.'); </script>";
            }
        } else {
            echo "<script> alert('Erro ao enviar a imagem.'); </script>";
        }
    } else {
        echo "<script> alert('Imagem de perfil ou imagem de fundo não foi selecionada.'); </script>";
    }
    
} else {
    echo "<script> alert('Método de requisição inválido.'); </script>";
}

$conexao->close();
?>
