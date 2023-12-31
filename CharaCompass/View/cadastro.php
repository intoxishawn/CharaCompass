<?php
session_start();

if (isset($_SESSION['msg'])) {
    echo '<script>alert("' . $_SESSION['msg'] . '");</script>';
    unset($_SESSION['msg']);
}

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
    <script src="cadastroCodes.js"></script>
    <link href="../View/CSS/login_cadastro.css" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="../View/Imagens/favicon-32x32.png">
    <title> Criar Conta </title>
</head>
<body>
    <header>
        <h1> CharaCompass</h1>
        <h2> Criar Conta </h2>
    </header>

    <nav>
        <button onclick="AbreHome()" class="nav_button"> Voltar </button>
        <button onclick="AbreLogin()" class="nav_button"> Login </button>
    </nav>

    <div id="main">
        <div id="formulario02">
            <form action="../Controller/cadastrarCliente.php?acao=cadastrar" method="POST">
            <label for="new_username"> Username </label>
            <br>
            <input type="text" placeholder="Ex.: ParyBlocks" id="new_username" name="new_username" class="input01" maxlength="50" required="required">
            <br><br><br>
            <label for="new_email"> Email </label>
            <br>
            <input type="email" placeholder="email@email.com" id="new_email" name="new_email" class="input01" maxlength="50" required="required">
            <br><br><br>
            <label for="new_senha"> Senha </label>
            <br>
            <input type="password" placeholder="Digite sua senha" id="new_senha" name="new_senha" class="input01" maxlength="50" required="required">
            <br><br><br>
            <div id="criarconta01">
            <input type="submit" value="Criar Conta" id="submit01" class="input01">
            </div>
            <br>
            <hr>
        </form>
        <p> Já possui conta? </p>
        <button id="submit01" onclick="AbreLogin()"> Acessar </button>
    </div>
    </div>
    <footer>
        <h3> CharaCompass - 2023 </h3>
        <p> A bussola do seu mundo para seus personagens </p>
    </footer>
</body>
</html>