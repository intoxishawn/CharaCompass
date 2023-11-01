<?php
$acao = isset($_GET['acao']) ? $_GET['acao'] : '';

if ($acao === 'criar') {
    include_once '../Model/Mundo.class.php';
    $mundo = new Mundo();
    $mundo->setNome($_POST['new_name']);
    $mundo->setInfo($_POST['new_info']);
    $mundo->setTrivia($_POST['new_trivia']);
    $mundo->save();
    
    header("Location: ../View/addMundo.php");
    exit();
}
?>