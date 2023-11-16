<?php
session_start();
if (session_status() === PHP_SESSION_ACTIVE) {
    // Sessão está ativa
} else {
    header("Location: login.php");
    exit();
}

include_once('../Model/objeto.class.php');
include_once '../Controller/Conexao.php';
include_once '../Model/Cliente.class.php';

$id = $_SESSION['id'];
$pfp = Cliente::getOne($id);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
    <script src="inicialCodes.js"></script>
    <link rel="icon" type="image/x-icon" href="../View/Imagens/favicon-32x32.png">
    <title></title>
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
        <button class="nav_perfil" onclick="abreEditar()"> Editar </button>
        <button class="nav_perfil" onclick="desconectar()"> Desconectar </button>        
    </nav>
    <div id="main">
    
        <div class="explicacao01">
            <div id="fotodeperfil">
            <?php 
            
            echo "<div class=\"tituloPagina\">";
            echo '<img src="' . $pfp['pfp_caminho'] . '">';
            echo "</div>";

            ?>
        </div>
            <div class="conteudo">
                <p id="username"><?php echo $_SESSION['nome'] ?></p>
            </div> 
        </div>
       <div id="adição">
                <button id="btn_add" onclick="criarObjeto()"> + </button>
            </div>
      <h3 id="titulo_pagina"> Seus objetos </h3>
      <div id="galeria">
      <?php
      $id = 0;
      $nome = "";
      $caracteristicas = "";
      $historia = "";
      $trivia = "";
      $cliente_id = "";
      $objeto = new Objeto($id, $nome, $caracteristicas, $historia, $trivia, $cliente_id);
      $objeto->listarObjeto();

      echo '<script>
        function confirmarExclusao(idObjeto) {
        var confirmacao = confirm("Tem certeza que deseja excluir este Objeto?");
        if (confirmacao) {
            window.location.href ="../Controller/objetoController.php?acao=deletar&id=" + idObjeto;
        }
    }
</script>';
      ?>
      </div>
      </div>

    <footer>
        <h3> CharaCompass - 2023 </h3>
        <p> A bússola do seu mundo para seus personagens </p>
    </footer>
</body>
</html>