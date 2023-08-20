<?php
include_once('../cadastro/conexao.php');
include_once('../users/buscardado.php');

// Captura o ID da imagem do post a partir do parâmetro na URL
if (isset($_GET['id'])) {
    $postId = $_GET['id'];

    // Use o ID para buscar as informações do post e da imagem
    $posts_sql = "SELECT * FROM posts WHERE id = '$postId'";
    $posts_result = $conexao->query($posts_sql);

    if ($posts_result !== false && $posts_result->num_rows > 0) {
        $row = $posts_result->fetch_assoc();
        $post_image = $row['imagem'];
        $name = $row['nome'];
        $desc = $row['descricao'];
        $data = $row['data'];
        $user_id = $row['id_user'];

        // Corrigir a consulta para buscar os detalhes do usuário
        $user_sql = "SELECT * FROM users WHERE id = '$user_id'";
        $user_result = $conexao->query($user_sql);

        if ($user_result !== false && $user_result->num_rows > 0) {
            $user_row = $user_result->fetch_assoc();
            $non = $user_row['nick'];
            $perf = $user_row['perfil'];
        } else {
            echo "<p>Nenhum usuário encontrado!</p>";
        }
    } else {
        echo "<p>Post não encontrado.</p>";
    }

} else {
    echo "<p>ID do post não fornecido.</p>";
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link href="https://fonts.googleapis.com/css2?family=Calistoga&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="posts.css">
    <link rel="icon" href="../icones/iconinho.png" type="image/png">
    <title>Lunar</title>

</head>

<body>
    <aside>
        <header id="logo">
            <img class="logo" src="../icones\icone.png" alt="logo">
        </header>

        <nav class="links">
            <button>
                <span>
                    <i class="material-symbols-outlined trans"> home </i>
                    <span><a href="../paginaPrincipal.php">HOME</a></span>
                </span>
            </button>
            <button>
                <span>
                    <i class="material-symbols-outlined trans"> &#xE8B6 </i>
                    <span><a href="../explorar/explorar.php">EXPLORAR</a></span>
                </span>
            </button>
            <button>
                <span>
                    <i class="material-symbols-outlined trans"> favorite </i>
                    <span>NOTIFICAÇÕES</span>
                </span>
            </button>
            <button>
                <span>
                    <i class="material-symbols-outlined trans">group_add</i>
                    <span><a href="../chat/chat.php">CHAT</a></span>
                </span>
            </button>
            <button>
                <span>
                    <i class="material-symbols-outlined trans"> Add_circle </i>
                    <span><a href="../up/up.php">ADICIONAR</a></span>
                </span>
            </button>
            <button>
                <span>
                    <img src="<?php echo $perfil; ?>" alt="Foto de perfil" class="perfil2">
                    <span><a href="../users/user.php" id="usuario">
                            <?php echo $nome; ?>
                        </a></span>
                </span>
            </button>
        </nav>
    </aside>
    <article class="principal">
        <div class="post">
            <img src="../<?php echo $post_image; ?>" alt="Imagem do Post">
            <div class="texto">
                <h1><?php echo $name; ?></h1>
                <p><?php echo $desc; ?></p>
            </div>
            <div class="perfil">
                    <img src="../cadastro/<?php echo $perf; ?>" alt="">
                    <p style="margin-left: 10px; font-size: 20px; font-weight: bold;"><?php echo $non; ?></p>
            </div>
        </div>
    </article>
</body>

</html>