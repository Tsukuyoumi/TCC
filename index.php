<?php
    session_start();
    if((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha']) == true)){
        unset($_SESSION['email']);
        unset($_SESSION['senha']);
    }else{
        header('Location: paginaPrincipal.php');
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

    <link rel="stylesheet" href="style.css">
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
                    <span><a href="index.php">HOME</a></span>
                </span>
            </button>
            <button onclick="clicar1()">
                <span>
                    <i class="material-symbols-outlined trans"> &#xE8B6 </i>
                    <span>EXPLORAR</span>
                </span>
            </button>
            <button onclick="clicar1()">
                <span>
                    <i class="material-symbols-outlined trans"> favorite </i>
                    <span>NOTIFICAÇÕES</span>
                </span>
            </button>
            <button onclick="clicar1()">
                <span>
                    <i class="material-symbols-outlined trans">group_add</i>
                    <span>CHAT</span>
                </span>
            </button>
            <button onclick="clicar1()">
                <span>
                    <i class="material-symbols-outlined trans"> Add_circle </i>
                    <span>ADICIONAR</span>
                </span>
            </button>
            <button onclick="clicar1()">
                <span>
                    <i class="material-symbols-outlined trans">Person</i>
                    <span><a id="usuario">USUARIO</a></span>
                </span>
            </button>
        </nav>
    </aside>

    <article>
        <h1>Hello World</h1>
    </article>

    <div class="logar">
        <button class="login" onclick="window.location.href = 'cadastro/login.php'">conectar</button>
        <button class="login" onclick="window.location.href = 'cadastro/cadastro.php'">cadastrar</button>
    </div>

    <script>
        var a = window.document.getElementById('usuario');

        function clicar1() {
            confirm('Você precisa estar logado para acessar esta pagina!!!');
        }
    </script>


</body>

</html>