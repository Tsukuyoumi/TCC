<?php
include_once('../cadastro/conexao.php');
include_once('buscardado.php');
$perfil = "../cadastro/" . $row["perfil"];
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
    <link rel="stylesheet" href="user.css">
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
                    <span><a href="users/user.php" id="usuario">USUARIO</a></span>
                </span>
            </button>
        </nav>
    </aside>
    <article class="principal">
        <div class="linha">
            <div class="Perfil">
                <div class="area-imagem">
                    <img src="<?php echo $backFoto; ?>" alt="background">
                </div>
                <img src="<?php echo $perfil; ?>" alt="Foto de perfil" class="perfil">

                <h3>
                    <?php echo $nome; ?>
                </h3> <!-- Fechamento da tag h3 -->
                <h2>
                    <?php echo "🌘" . $tipoArt; ?>
                </h2>

                <p class="F">Seguidores:
                    <?php echo $num_seguidores; ?>
                </p>
                <p class="S">Seguindo:
                    <?php echo $num_seguindo; ?>
                </p>

                <p class="bio" id="bio">
                    <?php echo $bio; ?>
                </p>
            </div>
        </div>

    </article>
    <div class="imagens">
            <?php
            if ($posts_result !== false && $posts_result->num_rows > 0) {
                while ($row = $posts_result->fetch_assoc()) {
                    $post_image = $row['imagem'];
                    $post_date = $row['data'];

                    echo "<div class='post-item result-item post'>"; // Aplica as classes CSS
                    echo "<img src='../$post_image' alt='Imagem do Post'>";
                    echo "</div>";
                }
            } else {
                echo "<p>Nenhum post encontrado.</p>";
            }
            ?>
        </div>
</body>

</html>