<?php
session_start();
include_once('conexao.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $id = $_SESSION['id_usuario'];
    $bio = nl2br($_POST['bio']);
    $arte = $_POST['tipoArt'];

    // Verifica quais arquivos estão definidos
    $perfil_set = isset($_FILES['perfil']);
    $back_set = isset($_FILES['back']);

    // Verifica quais campos estão definidos
    $bio_set = !empty($bio);
    $arte_set = !empty($arte);

    // Atualiza apenas os campos que estão definidos
    if (($perfil_set && $back_set && $bio_set && $arte_set) || ($bio_set && $arte_set) || ($perfil_set && $back_set)) {

        // Atualiza a biografia e o tipo de arte
        if ($bio_set && $arte_set) {
            $result = mysqli_query($conexao, "UPDATE users SET bio='$bio', tipoArt='$arte' WHERE id = $id");
        }

        // Atualiza os arquivos de perfil e fundo
        else if ($perfil_set && $back_set) {
            $imagem_temporaria_perfil = $_FILES['perfil']['tmp_name'];
            $nome_imagem_perfil = $_FILES['perfil']['name'];
            $caminho_destino_perfil = 'fotosPerfil/' . $nome_imagem_perfil;

            $imagem_temporaria_back = $_FILES['back']['tmp_name'];
            $nome_imagem_back = $_FILES['back']['name'];
            $caminho_destino_back = 'fotosPerfil/' . $nome_imagem_back;

            if (move_uploaded_file($imagem_temporaria_perfil, $caminho_destino_perfil) && move_uploaded_file($imagem_temporaria_back, $caminho_destino_back)) {
                $result = mysqli_query($conexao, "UPDATE users SET perfil='$caminho_destino_perfil', backFoto='$caminho_destino_back' WHERE id = $id");
            } else {
                echo "<script> alert('Erro ao enviar a imagem.'); </script>";
                exit();
            }
        }

        // Atualiza apenas a biografia
        else if ($bio_set) {
            $result = mysqli_query($conexao, "UPDATE users SET bio='$bio' WHERE id = $id");
        }

        // Atualiza apenas o tipo de arte
        else if ($arte_set) {
            $result = mysqli_query($conexao, "UPDATE users SET tipoArt='$arte' WHERE id = $id");
        }

        if ($result) {
            header('Location: ../seguir/seguir.php');
        } else {
            echo "<script> alert('Erro ao atualizar perfil.'); </script>";
        }
    } else {
        echo "<script> alert('Imagem de perfil ou imagem de fundo não foi selecionada.'); </script>";
    }
    
} else {
    echo "<script> alert('Método de requisição inválido.'); </script>";
}

$conexao->close();
?>