<?php
session_start();
include_once('../cadastro/conexao.php');

$id_user = $_SESSION['id_usuario'];
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["email"]) && isset($_POST["senha"])) {
    $email = $_POST["email"];
    $senha = $_POST["senha"];

    // Consulta SQL para verificar o email e a senha correspondentes
    $stmt = $conexao->prepare("SELECT id, senha FROM users WHERE id = ? AND email = ?");
    $stmt->bind_param("is", $id_user, $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $hashedPassword = $row["senha"];

        // Verifique se a senha fornecida corresponde à senha no banco de dados
        if (password_verify($senha, $hashedPassword)) {
            // A senha corresponde, você pode excluir a conta

            // Agora, exclua a conta
            $stmt = $conexao->prepare("DELETE FROM users WHERE id = ?");
            $stmt->bind_param("i", $id_user);

            if ($stmt->execute()) {
                // Conta excluída com sucesso
                header("Location: logout.php"); // Redirecionar para a página de logout ou outra página apropriada
                exit;
            } else {
                echo "Erro ao excluir a conta: " . $stmt->error;
            }
        } else {
            echo "Senha incorreta. A conta não foi excluída.";
        }
    } else {
        echo "Email não encontrado. A conta não foi excluída.";
    }

    $stmt->close();
}

?>
