<?php
$acao = isset($_GET['acao']) ? $_GET['acao'] : '';

if ($acao === 'cadastrar') {
    include_once '../PHP/Cliente.class.php';
    $cliente = new Cliente();
    $cliente->setNew_username($_POST['new_username']);
    $cliente->setNew_email($_POST['new_email']);
    $cliente->setNew_senha($_POST['new_senha']);
    $cliente->save();
    
    header('Location: ../HTML/cadastro.html');
    exit();
}
?>