<?php 

if(isSet($_SESSION)){
    session_start();
}else if(!isSet($_SESSION)){
    header("Location: login.php");
}

include_once '../Controller/Conexao.php';
include_once '../Model/Mundo.class.php';

$id = isset($_GET['id']) ? $_GET['id'] : null;
$criacao = Mundo::getOne($id);
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
    <script src="perfil.js"></script>
    <title> Mundo </title>
</head>
<body>
    <header>
        <h1> CharaCompass </h1>
        <p> Mundo </p>
    </header>

    <nav>
        <button class="nav_button" onclick="abreMundo()"> Voltar </button>
    </nav>

    <?php
        // Verificando se a criação foi encontrada
        if ($criacao) {
            echo "<div id=\"titulopagina\">";
            echo "<h3>" . $criacao['nome_mundo'] . "</h3>";
            echo "</div>";

            echo "<div id=\"geral\">";
            echo "<h3> Informações gerais do Mundo </h3>";
            echo "<p>" . $criacao['info_mundo'] . "</p>";
            echo "</div>";

            echo "<div id=\"trivias\">";
            echo "<h3> Trivias </h3>";
            echo "<p>" . $criacao['trivia_mundo'] . "</p>";
            echo "</div>";
        } else {
            echo "Criação não encontrada.";
        }
        ?>
    </div>

    <footer> 
        <h3 id="footnote">CharaCompass - 2023</h3>
        <p>A bussola do seu mundo para seus personagens </p>
    </footer>
</body>
</html>