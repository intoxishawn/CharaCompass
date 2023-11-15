<?php
session_start();
if (session_status() === PHP_SESSION_ACTIVE) {
    // Sessão está ativa, o usuário está logado
} else {
    // Sessão não está ativa, redirecione para a página de login
    header("Location: login.php");
    exit(); // Encerrar o script após o redirecionamento
}

include_once '../Controller/Conexao.php';
include_once '../Model/Objeto.class.php';

$id = isset($_GET['id']) ? $_GET['id'] : null;
$criacao = Objeto::getOne($id);
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
    <script src="perfil.js"></script>
    <link rel="icon" type="image/x-icon" href="../View/Imagens/favicon-32x32.png">
    <title> Objeto </title>
</head>
<body>
    <header>
        <h1> CharaCompass </h1>
        <p> Objeto </p>
    </header>

    <nav>
        <button class="nav_button" onclick="abreObjeto()"> Voltar </button>
    </nav>

    <div id="main">
        <?php
            if($criacao){
            echo "<div id=\"titulopagina\">";
            echo "<h3>" . $criacao['nome_objeto'] . "</h3>";
            echo "</div>";

            echo "<div id=\"caracteristicas\">";
            echo "<h3> Características do Objeto </h3>";
            echo "<p>" . $criacao['caracteristicas'] . "</p>";
            echo "</div>";
            
            echo "<div id=\"historia\">";
            echo "<h3> História do Objeto </h3>";
            echo "<p>" . $criacao['historia_objeto'] . "</p>";
            echo "</div>";

            echo "<div id=\"trivias\">";
            echo "<h3> Trivias </h3>";
            echo "<p>" . $criacao['trivia_objeto'] . "</p>";
            echo "</div>";
        } else {
            }
        ?>
    </div>
    <footer> 
        <h3 id="footnote">CharaCompass - 2023</h3>
        <p>A bussola do seu mundo para seus personagens </p>
    </footer>
</body>
</html>