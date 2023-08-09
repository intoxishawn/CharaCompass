<?php
$acao = isset($_GET['acao']) ? $_GET['acao'] : '';
$senha = $_POST['new_senha'];
$hashedSenha = password_hash($senha, PASSWORD_DEFAULT); //usar password_verify() no login

if ($acao === 'cadastrar') {
    include_once '../PHP/Cliente.class.php';
    $cliente = new Cliente();
    $cliente->setNome($_POST['new_username']);
    $cliente->setEmail($_POST['new_email']);
    $cliente->setSenha($hashedSenha);
    $cliente->save();

    
    
    header('Location: ../HTML/cadastro.html');
    exit();
}
?>