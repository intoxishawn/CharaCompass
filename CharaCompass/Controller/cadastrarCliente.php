<?php
$acao = isset($_GET['acao']) ? $_GET['acao'] : '';

if ($acao === 'cadastrar') {
    include_once '../Model/Cliente.class.php';
    $cliente = new Cliente();
    $cliente->setNome($_POST['new_username']);
    $cliente->setEmail($_POST['new_email']);
    $cliente->setSenha($_POST['new_senha']);
    $cliente->save();

    if ($cliente->save()) {
        $mensagem = "Cadastro realizado com sucesso!";
    }
    
    header("Location: ../View/cadastro.php");
    exit();
}
?>