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
include_once '../Model/Personagem.class.php';

$id = isset($_GET['id']) ? $_GET['id'] : null;
$criacao = Personagem::getOne($id);

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
    <title> Personagem </title>
</head>
<body>
    <header>
        <h1> CharaCompass </h1>
        <p> Personagem </p>
    </header>

    <nav>
        <button class="nav_button" onclick="abrePersonagens()">Voltar</button>
    </nav>

    <div id="main">
        <div id="titulopagina">
            <?php
              echo "<h3>" . $criacao['nome_personagem'] . "</h3>";
            ?>
        </div>

        <div id="icone">
            
        </div>

        <div id="geral">
        <?php
        // Verificando se a criação foi encontrada
        if ($criacao) {
            echo "<div id=\"geral\">";
            echo "<h3> Informações gerais de " . $criacao['nome_personagem'] . "</h3>";
            echo "<p>" . $criacao['info_personagem'] . "</p>";
            echo "</div>";

            echo "<div id=\"geral\">";
            echo "<h3> Personalidade de " . $criacao['nome_personagem'] . "</h3>";
            echo "<p>" . $criacao['personalidade'] . "</p>";
            echo "</div>";

            echo "<div id=\"geral\">";
            echo "<h3> História de " . $criacao['nome_personagem'] . "</h3>";
            echo "<p>" . $criacao['historia'] . "</p>";
            echo "</div>";

            echo "<div id=\"trivias\">";
            echo "<h3> Curiosidades sobre " . $criacao['nome_personagem'] . "</h3>";
            echo "<p>" . $criacao['trivia_personagem'] . "</p>";
            echo "</div>";
        } else {
            echo "Personagem não encontrado.";
        }
        ?>
    </div>
    <footer> 
        <h3 id="footnote">CharaCompass - 2023</h3>
        <p>A bussola do seu mundo para seus personagens </p>
    </footer>
</body>
</html>