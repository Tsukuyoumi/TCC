<?php

include_once('../cadastro/conexao.php');
include_once('../users/buscardado.php');

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
    <link rel="stylesheet" href="config.css">
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
            <button onclick="openModal()">
                <span>
                    <i class="material-symbols-outlined trans"> favorite </i>
                    <span>NOTIFICAÇÕES</span>
                </span>
            </button>
            <button>
                <span>
                    <i class="material-symbols-outlined trans"> Add_circle </i>
                    <span><a href="../up/up.php">ADICIONAR</a></span>
                </span>
            </button><br><br><br><br><br>
            <button>
                <span>
                    <div perfil2_container>
                        <img src="<?php echo $perfil; ?>" alt="Foto de perfil" class="perfil2">
                    </div>
                    <span><a href="../users/user.php" id="usuario">
                            <?php echo $nome; ?>
                        </a></span>
                </span>
            </button>
        </nav>
    </aside>
    <article class="principal">
    <div class="Usuario">
        <div class="linha2">
        <div class="U">
            <h1>Configurações do usuario</h1>
        <form method="POST" action="../Codigos/up.php" enctype="multipart/form-data">
            <p>ATUALIZAR EMAIL: <input type="email" name="email"></p>
            <p>ATUALIZAR SENHA: <input type="password" name="senha"></p>
        <br>
        <input class="enviar" type="submit" name="atualizarEmail" value="Atualizar Email">
        <input class="enviar" type="submit" name="atualizarSenha" value="Atualizar Senha">
    </form>       
    </div>
    </div>
    <div class="linha2">
    <div class="apagar">
        <h1>APAGAR CONTA</h1>
        <form method="POST" action="../Codigos/apagar.php">
            <p>ATUALIZAR EMAIL: <input type="email" name="email"></p>
            <p>ATUALIZAR SENHA: <input type="password" name="senha"></p>
            <br>
            <input class="enviar" type="submit" name="apagar" value="apagar" class="linha">
        </form>
    </div>
    </div>
</div>
<br>
    <button class="opcao"><a href="../Codigos/logout.php">Desconectar </a></button>

    </article>

    </body>
</html>