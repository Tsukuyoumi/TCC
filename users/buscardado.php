<?php
        session_start();
        $id_user = $_SESSION['id_usuario'];

        include_once('../cadastro/conexao.php');

        $sql = "SELECT nome, nick, email, perfil, backFoto, tipoArt, bio FROM users WHERE id = $id_user";
        $result = $conexao->query($sql);

        // Exibir os resultados
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $perfil = "../cadastro/" . $row["perfil"];
            $backFoto = "../cadastro/" . $row["backFoto"];
            $nome = $row["nome"];
            $email = $row["email"];
            $tipoArt = $row["tipoArt"];
            $bio = $row['bio'];
        } else {echo "Nenhum resultado encontrado.";}

        // Fechar a conexão
        $conexao->close();
        ?>