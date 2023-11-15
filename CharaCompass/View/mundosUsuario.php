<?php
session_start();
if (session_status() === PHP_SESSION_ACTIVE) {
    // Sessão está ativa, o usuário está logado
} else {
    // Sessão não está ativa, redirecione para a página de login
    header("Location: login.php");
    exit(); // Encerrar o script após o redirecionamento
}

include_once('../Model/mundo.class.php');
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
    <script src="inicialCodes.js"></script>
    <link rel="icon" type="image/x-icon" href="../View/Imagens/favicon-32x32.png">
    <title> Meus Mundos </title>
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
                <p id="username"><?php echo $_SESSION['nome'] ?></p>
                <p>Biografia</p>
            </div>
        </div>

        <div id="adição">
            <button id="btn_add" onclick="criarMundo()"> + </button>
        </div>
       
      <h3 id="titulo_pagina"> Seus Mundos </h3>
      <div id="galeria">
      <?php
      $id = 0;
      $nome = "";
      $info = "";
      $trivia = "";
      $cliente_id = "";
      $mundo = new Mundo($id, $nome, $info, $trivia, $cliente_id);
      $mundo->listarMundo();

      echo '<script>
        function confirmarExclusao(idMundo) {
        var confirmacao = confirm("Tem certeza que deseja excluir este mundo?");
        if (confirmacao) {
            window.location.href ="../Controller/mundoController.php?acao=deletar&id=" + idMundo;
        }
    }
</script>';
      ?>
      </div>
        
      </div>
      </div>

    <footer>
        <h3> CharaCompass - 2023 </h3>
        <p> A bússola do seu mundo para seus personagens </p>
    </footer>
</body>
</html>