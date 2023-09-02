<?php
session_start();
if ((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha']) == true)) {
    unset($_SESSION['email']);
    unset($_SESSION['senha']);
} else {
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
                    <i class="material-symbols-outlined trans"> Add_circle </i>
                    <span>ADICIONAR</span>
                </span>
            </button><br><br><br><br>
            <button onclick="clicar1()">
                <span>
                    <i class="material-symbols-outlined trans">Person</i>
                    <span><a id="usuario">USUARIO</a></span>
                </span>
            </button>
        </nav>
    </aside>

    <article>
        <div class="conteudo">
        <img class="lua" src="icones\iconinho.png" alt="logo">
            <div class="Sobre">
                <h1>Sobre:</h1>
                <p> &nbsp;&nbsp;&nbsp;Com o crescente aumento do uso das redes sociais para promover artistas vem crescendo
                ao longo dos anos. Mas em meio a isso vemos artistas ficando presos às poucas ferramentas para ganhar
                visibilidade, e alcançar cada vez mais pessoas que tenham um gosto artístico parecido com o seu.
                Tornando o seu crescimento ainda mais lento e dependente de um algoritmo que muitas vezes não mostra
                seus posts a novas pessoas.
                O objetivo da Lunar é ser um local com ferramentas, visibilidade e que com o tempo se torne uma grande
                comunidade de artistas.
                </p>
            </div>
                <h1 id="h1">POSTS</h1>
            <br>            <br>

            <div class="Sobre">
                <p>&nbsp;&nbsp;&nbsp;Ao primeiro momento em que você entra na pagina, pelo fato de não seguir niguem o ststema opta por te mostar 4 colunas de posts de pessoas que estão a baixo da media de seguidores, media essa que é feita somando todos os numeros de pessoas seguidas pelos usuarios do site e então divide pelo numero de usuarios do site.</p>           </div>
            <div class="post">
                <img class="Foto" src="icones\Ap1.png" alt="logo">
                <p class="posts"> &nbsp;&nbsp;&nbsp;As duas primeiras colunas são para posts de pessoas a qual você segue.<br>
                     &nbsp;&nbsp;&nbsp;As duas ultimas colunas são para posts de pessoas a qual você não segue, sendo a primeira de pessoas com grau de visibilidade a cima da media, já a ultima é para pessoas novas terem mais visibilidade.
            </p>
            </div>
        </div>
    </article>

    <div class="logar">
        <button class="login" onclick="window.location.href = 'cadastro/login.php'">conectar</button>
        <button class="logi" onclick="window.location.href = 'cadastro/cadastro.php'">cadastrar</button>
    </div>

    <script>
        var a = window.document.getElementById('usuario');

        function clicar1() {
            confirm('Você precisa estar logado para acessar esta pagina!!!');
        }
    </script>


</body>

</html>