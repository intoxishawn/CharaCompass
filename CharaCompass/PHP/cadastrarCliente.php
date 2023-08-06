<?php
$acao = $_GET['acao'];

include_once '../PHP/Cliente.class.php';

if ($acao == 'cadastrar'){
    $usuario = new Usuario();
    $usuario->setNew_username($_POST['new_username']);
    $usuario->setNew_email($_POST['new_email']);
    $usuario->setNew_senha($_POST['new_senha']);
    $usuario->save();
    header('Location:../HTML.cadastro.html');
    exit();
}
?>