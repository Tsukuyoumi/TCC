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

    // Move a imagem para o diretório desejado (neste exemplo, o diretório 'imagens')
    $caminho_destino = 'uploads/' . $nome_imagem;
    move_uploaded_file($imagem_temporaria, $caminho_destino);
  } else {
    die("Erro ao enviar a imagem.");
  }
$id_user = $_SESSION['id_usuario'];
  // Insere os dados no banco de dados
  $sql = "INSERT INTO Posts (imagem, nome, tipoArt, descricao, id_user) VALUES ('$caminho_destino', '$nome', '$tipoArte', '$descricao', '$id_user')";

  if ($conexao->query($sql) === TRUE) {
    echo "<script>alert('Imagem cadastrada'); window.location.href = 'paginaPrincipal.php';</script>";
  } else {
    echo "<script>alert('Erro ao cadastrar imagem'); window.location.href = 'paginaPrincipal.php';</script>";
  }

  // Fecha a conexão com o banco de dados
  $conexao->close();
}
?>

