<?php

include_once '../Model/Cliente.class.php';

if(isset($_POST['email']) || isset($_POST['senha'])){
        $cliente = new Cliente();
        $cliente->setEmail($_POST['email']);
        $cliente->setSenha2($_POST['senha']);
        $usuario->login();
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
    <script src="loginCodes.js"></script>
    <link href="../View/CSS/login_cadastro.css" rel="stylesheet">
    <title> Acessar a conta </title>
</head>
<body>
    <header>
        <h1> CharaCompass</h1>
        <h2> Acesse sua conta</h2>
    </header>
    
    <nav>
        <button onclick="AbreHomepage()" class="nav_button"> Voltar </button>
        <button onclick="AbreCadastro()" class="nav_button"> Cadastre-se </button>
    </nav>

    <div id="main">
        
        <div id="formulario01">
            <form action="../Controller/logarCliente.php?acao=login" method="POST" id="login_id">
                <label for="email_cliente"> Email </label>
                <br>
                <input type="email" id="email_cliente" name="email" class="input01" required>
                <br><br><br>
                <label for="senha_cliente"> Senha </label>
                <br>
                <input type="password" id="senha_cliente" name="senha" class="input01" required>
                <br>
                <input type="checkbox" onclick="mostrarSenha()"> Mostrar senha
                <br><br><br>
                <input type="submit" value="Acessar" id="submit01">
                <br>
                <hr class="hr_customizada">
            </form>
            </div>
        </div>      
    </div>
        <footer>
        <h4> CharaCompass - 2023 </h4>
        <p> A bussola do seu mundo para seus personagens </p>
    </footer>
</body>
</html>