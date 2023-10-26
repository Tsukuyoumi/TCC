<?php
include_once("buscardado.php");
include_once("cadastro/conexao.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet" href="Pagina.css">
    <link rel="icon" href="icones/iconinho.png" type="image/png">
    <title>Lunar</title>
</head>

<body>

    <aside>
        <header id="logo">
            <img class="logo" src="icones\icone.png" alt="logo">
        </header>

        <nav class="links">
            <button>
                <span>
                    <i class="material-symbols-outlined trans"> home </i>
                    <span><a href="paginaPrincipal.php">HOME</a></span>
                </span>
            </button>
            <button>
                <span>
                    <i class="material-symbols-outlined trans"> &#xE8B6 </i>
                    <span><a href="explorar/explorar.php">EXPLORAR</a></span>
                </span>
            </button>
            <button onclick="openModal()">
                <span>
                    <i class="material-symbols-outlined trans"> favorite </i>
                    <span>NOTIFICAÇÕES</span>
                </span>
            </button>
            <button>
                <span>
                    <i class="material-symbols-outlined trans"> Add_circle </i>
                    <span><a href="up/up.php">ADICIONAR</a></span>
                </span>
            </button>
            <button><span> 
                    <i class="material-symbols-outlined">build_circle </i>
                <span><a href="config/config.php">OPÇÕES</a></span>
                </span>
            </button>
            <button>
                <span class="perfil-container">
                    <img src="<?php echo "cadastro/" . $perfil; ?>" alt="Foto de perfil" class="perfil2">
                    <span><a href="users/user.php" id="usuario">
                            <?php echo $nick; ?>
                        </a></span>
                </span>
            </button>

        </nav>
    </aside>
    <h1 class="posts-h1">Postagens</h1>

    

    <article>
        <?php
        $query_seguindo = "SELECT seguindo_id FROM seguidores WHERE seguidor_id = $id_user";
        $result_seguindo = $conexao->query($query_seguindo);

        $seguindo_ids = array();
        while ($row_seguindo = $result_seguindo->fetch_assoc()) {
            $seguindo_ids[] = $row_seguindo['seguindo_id'];
        }

        if (!empty($seguindo_ids)) {
            $in_clause = implode(",", $seguindo_ids);

            $query_posts = "SELECT id, imagem, id_user, nome FROM posts WHERE id_user IN ($in_clause) ORDER BY data DESC";
            $result_posts = $conexao->query($query_posts);

            $posts_per_column = ceil($result_posts->num_rows / 2); // Calcula quantos posts por coluna
            $current_column = 1;
            $post_count = 0;

            echo '<div class="imagens">';

            while ($row_posts = $result_posts->fetch_assoc()) {
                // Adicione esta consulta para buscar o nome e o perfil do usuário
                $query_user = "SELECT nick, perfil FROM users WHERE id = {$row_posts['id_user']}";
                $result_user = $conexao->query($query_user);
                $row_user = $result_user->fetch_assoc();

                if ($post_count == $posts_per_column) {
                    echo '</div><div class="imagens">';
                    $post_count = 0;
                }

                echo '<a href="posts/posts.php?id=' . $row_posts['id'] . '">';
                echo '<div class="result-item post" style="width: 257px; height: 500px; padding: 5px; margin-top: 10px;">';
                echo '<img src="' . $row_posts['imagem'] . '" alt="Imagem do Post" style="width: 100%; height: 100%; object-fit: cover; border-radius: 10px;">';
                echo "<p class='titulosP'>{$row_posts['nome']}{$row_user['nick']}</p>";
                echo '</div>';

                echo '<div class="centro">';
                echo "<img class='perfildono' src='cadastro/" . $row_user['perfil'] . "'>";
                echo "<p class='nomedono'> {$row_user['nick']}</p>";
                echo '</div>';

                echo '</a>';

                $post_count++;
            }


            echo '</div>';
        }


        // Obtendo os IDs das pessoas que você está seguindo
        $query_seguindo = "SELECT seguindo_id FROM seguidores WHERE seguidor_id = $id_user";
        $result_seguindo = $conexao->query($query_seguindo);

        $seguindo_ids = array();
        while ($row_seguindo = $result_seguindo->fetch_assoc()) {
            $seguindo_ids[] = $row_seguindo['seguindo_id'];
        }

        // Obtendo o seu próprio ID de usuário
        $meu_id = $id_user;

        // Obtendo os IDs de todos os usuários
        $query_todos_usuarios = "SELECT id FROM users";
        $result_todos_usuarios = $conexao->query($query_todos_usuarios);

        $todos_usuarios_ids = array();
        while ($row_todos_usuarios = $result_todos_usuarios->fetch_assoc()) {
            $todos_usuarios_ids[] = $row_todos_usuarios['id'];
        }

        // Filtrando os IDs de usuários que não estão sendo seguidos (exceto você)
        $nao_seguindo_ids = array_diff($todos_usuarios_ids, $seguindo_ids, array($meu_id));
        if (!empty($acima_media_ids)) {
            $in_clause = implode(",", $acima_media_ids);

            // Obtendo os posts dos usuários que não estão sendo seguidos, têm número de seguidores acima da média
            // e ordenando pela data
            $query_posts = "
            SELECT id, imagem, nome, id_user, data
            FROM posts
            WHERE id_user IN ($in_clause)
            ORDER BY data DESC
            ";

            $result_posts = $conexao->query($query_posts);

            $column = 1;
            echo '<div class="imagens">';

            while ($row_posts = $result_posts->fetch_assoc()) {

                $query_user = "SELECT nick, perfil FROM users WHERE id = {$row_posts['id_user']}";
                $result_user = $conexao->query($query_user);
                $row_user = $result_user->fetch_assoc();

                echo '<a href="posts/posts.php?id=' . $row_posts['id'] . '">';
                echo '<div class="result-item post" style="width: 257px; height: 500px; padding: 5px; margin-top: 10px;">';
                echo '<img src="' . $row_posts['imagem'] . '" alt="Imagem do Post" style="width: 100%; height: 100%; object-fit: cover; border-radius: 10px;">';
                echo "<p class='titulosP'>{$row_posts['nome']}</p>"; // Corrected line
                echo '</div>';
                echo '<div class="centro">';
                echo "<img class='perfildono' src='cadastro/" . $row_user['perfil'] . "'>";
                echo "<p class='nomedono'> {$row_user['nick']}</p>";
                echo '</div>';
                echo '</a>';

                if ($column == 2) {
                    echo '</div><div class="imagens">';
                }

                $column = ($column == 1) ? 2 : 1;
            }

            echo '</div>';
        }

        // Calculando a média do número de seguidores
        $query_contar_seguindo = "SELECT COUNT(*) AS numero_seguindo FROM seguidores WHERE seguidor_id = '$meu_id'";

        // Execute a consulta
        $resultado_contar_seguindo = $conexao->query($query_contar_seguindo);

        if ($resultado_contar_seguindo) {
            $row_contar_seguindo = $resultado_contar_seguindo->fetch_assoc();
            $numero_seguindo = $row_contar_seguindo['numero_seguindo'];


            if ($numero_seguindo == 0) {
                // Obter a média de seguidores
                $query_media_seguidores = "SELECT AVG(num_seguidores) AS media_seguidores FROM (SELECT seguindo_id, COUNT(*) AS num_seguidores FROM seguidores GROUP BY seguindo_id) AS tmp";
                $result_media_seguidores = $conexao->query($query_media_seguidores);
                $row_media_seguidores = $result_media_seguidores->fetch_assoc();
                $media_seguidores = $row_media_seguidores['media_seguidores'];

                // Obter os IDs dos usuários que você não segue e cujo número de seguidores está abaixo da média
                $query_usuarios_abaixo_media = "
    SELECT u.id
    FROM users u
    WHERE u.id <> '$meu_id' AND u.id NOT IN (SELECT seguindo_id FROM seguidores WHERE seguidor_id = '$meu_id') AND (SELECT COUNT(*) FROM seguidores WHERE seguindo_id = u.id) < $media_seguidores
";

                $result_usuarios_abaixo_media = $conexao->query($query_usuarios_abaixo_media);

                $nao_seguindo_ids = array();
                while ($row_usuarios_abaixo_media = $result_usuarios_abaixo_media->fetch_assoc()) {
                    $nao_seguindo_ids[] = $row_usuarios_abaixo_media['id'];
                }
                /*************************Ver essa parte *******************************************************/
                if (!empty($nao_seguindo_ids)) {
                    $in_clause = implode(",", $nao_seguindo_ids);

                    // Obter os posts dos usuários que não estão sendo seguidos e têm número de seguidores abaixo da média
                    $query_posts = "
        SELECT id, imagem, nome, id_user, data
        FROM posts
        WHERE id_user IN ($in_clause)
        ORDER BY data DESC
    ";

                    $result_posts = $conexao->query($query_posts);

                    $column = 1;
                    echo '<div class="imagens">';

                    while ($row_posts = $result_posts->fetch_assoc()) {

                        $query_user = "SELECT nick, perfil FROM users WHERE id = {$row_posts['id_user']}";
                        $result_user = $conexao->query($query_user);
                        $row_user = $result_user->fetch_assoc();

                        echo '<a href="posts/posts.php?id=' . $row_posts['id'] . '">';
                        echo '<div class="result-item post" style="width: 257px; height: 500px; padding: 5px; margin-top: 10px;">'; // Largura reduzida para acomodar quatro colunas
                        echo '<img src="' . $row_posts['imagem'] . '" alt="Imagem do Post" style="width: 100%; height: 100%; object-fit: cover; border-radius: 10px;">';
                        echo "<p class='titulosP'>{$row_posts['nome']}</p>"; // Corrected line
                        echo '</div>';
                        echo '<div class="centro">';
                        echo "<img class='perfildono' src='cadastro/" . $row_user['perfil'] . "'>";
                        echo "<p class='nomedono'> {$row_user['nick']}</p>";
                        echo '</div>';
                        echo '</a>';

                        if ($column == 4) { // Mudança para quatro colunas
                            echo '</div><div class="imagens">';
                            $column = 1;
                        } else {
                            $column++;
                        }
                    }

                    echo '</div>';
                }
            } else {
                $query_media_seguidores = "SELECT AVG(num_seguidores) AS media_seguidores FROM (SELECT seguindo_id, COUNT(*) AS num_seguidores FROM seguidores GROUP BY seguindo_id) AS tmp";
                $result_media_seguidores = $conexao->query($query_media_seguidores);
                $row_media_seguidores = $result_media_seguidores->fetch_assoc();
                $media_seguidores = $row_media_seguidores['media_seguidores'];

                // Obtendo os IDs dos usuários que você não segue e cujo número de seguidores está abaixo da média
                $query_usuarios_nao_seguidos = "
                SELECT u.id
                FROM users u
                WHERE u.id <> '$meu_id' AND u.id NOT IN (SELECT seguindo_id FROM seguidores WHERE seguidor_id = '$meu_id') AND (SELECT COUNT(*) FROM seguidores WHERE seguindo_id = u.id) < " . $media_seguidores;


                $result_usuarios_nao_seguidos = $conexao->query($query_usuarios_nao_seguidos);

                $nao_seguindo_ids = array();
                while ($row_usuarios_nao_seguidos = $result_usuarios_nao_seguidos->fetch_assoc()) {
                    $nao_seguindo_ids[] = $row_usuarios_nao_seguidos['id'];
                }

                if (!empty($nao_seguindo_ids)) {
                    $in_clause = implode(",", $nao_seguindo_ids);

                    // Obtendo os posts dos usuários que não estão sendo seguidos e têm número de seguidores acima da média
                    $query_posts = "
                     SELECT id, imagem, nome, id_user, data
                    FROM posts
                    WHERE id_user IN ($in_clause)
                    ORDER BY data DESC
                    ";

                    $result_posts = $conexao->query($query_posts);

                    $column = 1;
                    echo '<div class="imagens">';

                    while ($row_posts = $result_posts->fetch_assoc()) {

                        $query_user = "SELECT nick, perfil FROM users WHERE id = {$row_posts['id_user']}";
                        $result_user = $conexao->query($query_user);
                        $row_user = $result_user->fetch_assoc();

                        echo '<a href="posts/posts.php?id=' . $row_posts['id'] . '">';
                        echo '<div class="result-item post" style="width: 257px; height: 500px; padding: 5px; margin-top: 10px;">';
                        echo '<img src="' . $row_posts['imagem'] . '" alt="Imagem do Post" style="width: 100%; height: 100%; object-fit: cover; border-radius: 10px;">';
                        echo "<p class='titulosP'>{$row_posts['nome']}</p>"; // Corrected line
                        echo '</div>';
                        echo '<div class="centro">';
                        echo "<img class='perfildono' src='cadastro/" . $row_user['perfil'] . "'>";
                        echo "<p class='nomedono'> {$row_user['nick']}</p>";
                        echo '</div>';
                        echo '</a>';

                        if ($column == 2) {
                            echo '</div><div class="imagens">';
                        }

                        $column = ($column == 1) ? 1 : 1;
                    }

                    echo '</div>';
                }
                $query_media_seguidores = "SELECT AVG(num_seguidores) AS media_seguidores FROM (SELECT seguindo_id, COUNT(*) AS num_seguidores FROM seguidores GROUP BY seguindo_id) AS tmp";
                $result_media_seguidores = $conexao->query($query_media_seguidores);
                $row_media_seguidores = $result_media_seguidores->fetch_assoc();
                $media_seguidores = $row_media_seguidores['media_seguidores'];

                // Obtendo os IDs dos usuários que você não segue e cujo número de seguidores está acima da média
                $query_usuarios_acima_media = "
                SELECT u.id
                FROM users u
                WHERE u.id <> '$meu_id' AND u.id NOT IN (SELECT seguindo_id FROM seguidores WHERE seguidor_id = '$meu_id') AND (SELECT COUNT(*) FROM seguidores WHERE seguindo_id = u.id) > $media_seguidores
                ";

                $result_usuarios_acima_media = $conexao->query($query_usuarios_acima_media);

                $nao_seguindo_ids = array();
                while ($row_usuarios_acima_media = $result_usuarios_acima_media->fetch_assoc()) {
                    $nao_seguindo_ids[] = $row_usuarios_acima_media['id'];
                }

                if (!empty($nao_seguindo_ids)) {
                    $in_clause = implode(",", $nao_seguindo_ids);

                    // Obtendo os posts dos usuários que não estão sendo seguidos e têm número de seguidores acima da média
                    $query_posts = "
                    SELECT id, imagem, nome, id_user, data
                    FROM posts
                WHERE id_user IN ($in_clause)
                ORDER BY data DESC
                ";

                    $result_posts = $conexao->query($query_posts);

                    $column = 1;
                    echo '<div class="imagens">';

                    while ($row_posts = $result_posts->fetch_assoc()) {

                        $query_user = "SELECT nick, perfil FROM users WHERE id = {$row_posts['id_user']}";
                        $result_user = $conexao->query($query_user);
                        $row_user = $result_user->fetch_assoc();

                        echo '<a href="posts/posts.php?id=' . $row_posts['id'] . '">';
                        echo '<div class="result-item post" style="width: 257px; height: 500px; padding: 5px; margin-top: 10px;">';
                        echo '<img src="' . $row_posts['imagem'] . '" alt="Imagem do Post" style="width: 100%; height: 100%; object-fit: cover; border-radius: 10px;">';
                        echo "<p class='titulosP'>{$row_posts['nome']}</p>"; // Corrected line
                        echo '</div>';
                        echo '<div class="centro">';
                        echo "<img class='perfildono' src='cadastro/" . $row_user['perfil'] . "'>";
                        echo "<p class='nomedono'> {$row_user['nick']}</p>";
                        echo '</div>';
                        echo '</a>';

                        if ($column == 2) {
                            echo '</div><div class="imagens">';
                        }

                        $column = ($column == 1) ? 1 : 1; // Corrigindo a alternância das colunas
                    }

                    echo '</div>';
                }

            }
        }
        include('Codigos/modalN.php');
        ?>


        <script>
            // ... (seu código JavaScript) ...
        </script>

</body>

</html>