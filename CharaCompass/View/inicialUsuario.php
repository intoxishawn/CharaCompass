<?php
session_start();
if (!isset($_SESSION['id']) || !isset($_SESSION['nome'])) {
    // Redireciona para a página de login se a sessão não estiver ativa
    header("Location: login.php");
    exit(); // Termina o script para garantir que a página não seja processada mais adiante
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
    <script src="inicial_usuario.js"></script>
    <link rel="icon" type="image/x-icon" href="../View/Imagens/favicon-32x32.png">
    <title>Minha galeria</title>
</head>
<body>
    <header>
        <h1> CharaCompass </h1>
        <p> Criações </p>
    </header>

    <nav>
        <button class="nav_button" onclick="abreGaleria()"> Galeria </button>
        <button class="nav_button" onclick="abrePersonagens()"> Personagens </button>
        <button class="nav_button" onclick="abreMundos()"> Mundos </button>
        <button class="nav_button" onclick="abreObjetos()"> Objetos </button>
    </nav>

    <div id="main">
        <div class="explicacao01">
            <a onclick="abrePerfilUsuario()"><img id="pfp" src="Imagens/avatarplaceholder.png" alt="Foto de perfil"></a>
            <div class="conteudo">
            <p id="username"> Bem vindo(a) <?php echo $_SESSION['nome'] ?></p>
                <p>Biografia</p>
            </div>
        </div>
       
      <h3 id="titulo_pagina"> Suas Criações </h3>
      <div id="galeria">
        
      </div>
      </div>

    <footer>
        <h3> CharaCompass - 2023 </h3>
        <p> A bússola do seu mundo para seus personagens </p>
    </footer>
</body>
</html>