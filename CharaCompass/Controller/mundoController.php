<?php
$acao = isset($_GET['acao']) ? $_GET['acao'] : '';

if ($acao === 'criar') {
    include_once '../Model/Mundo.class.php';
    session_start();
    $clienteId = $_SESSION["id"];

    $mundo = new Mundo();
    $mundo->__set("nome", $_POST['new_name']);
    $mundo->__set("info", $_POST['new_info']);
    $mundo->__set("trivia", $_POST['new_trivia']);
    $mundo->__set("cliente_id", $clienteId);
    $mundo->save();
    header("Location: ../View/mundosUsuario.php");
    exit();
} else if($acao === 'atualizar'){
    include_once '../Model/Mundo.class.php';
    $mundo = new Mundo();
    $mundo->__set("id", $_POST['id']);
    $mundo->__set("nome", $_POST['ed_name']);
    $mundo->__set("info", $_POST['ed_info']);
    $mundo->__set("trivia", $_POST['ed_trivia']);
    $mundo->update();
    
    header("Location: ../View/mundosUsuario.php");
    exit();
} else if($acao === 'deletar'){
    include_once '../Model/Mundo.class.php';
    Mundo::delete($_REQUEST['id']);
    header("Location: ../View/mundosUsuario.php");
}
?>