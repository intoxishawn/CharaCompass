<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Atualize sua senha </title>
</head>
<body>
    <header>
        <h1> CharaCompass</h1>
        <h2> Esqueci a minha senha </h2>
    </header>
    <nav>
        <button onclick="AbreLogin()" class="nav_button"> Voltar </button>
        <button onclick="AbreCadastro()" class="nav_button"> Cadastre-se </button>
    </nav>
    <div id="main">
        <div id="formulario01">
            <form>
                <label for="nova_senha"> Insira sua nova senha: </label>
                <input type="password" name="nova_senha">
                <br>
                <label for="conf_senha"> Confirme sua senha: </label>
                <input type="password" name="nova_senha">
                <br><br>
                <input type="submit" value="Salvar mudança">
            </form>
            <br><br><br>
    </div>
    </div>
    <footer>
        <h4> CharaCompass - 2023 </h4>
        <p> A bussola do seu mundo para seus personagens </p>
    </footer>
</body>
</html>