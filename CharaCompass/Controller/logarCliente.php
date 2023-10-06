<?php
$acao = isset($_GET['acao']) ? $_GET['acao'] : '';

if ($acao === 'login') {
    include_once '../Model/Cliente.class.php';
    $cliente = new Cliente();
    $cliente->setEmail($_POST['email01']);
    $cliente->setSenha($_POST['senha01']);
    $cliente->login();
    exit();
}
    
?>