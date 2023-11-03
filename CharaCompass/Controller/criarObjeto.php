<?php
$acao = isset($_GET['acao']) ? $_GET['acao'] : '';

if ($acao === 'criar') {
    include_once '../Model/Objeto.class.php';
    $objeto = new Objeto();
    $objeto-> setId($POST['id_mundo']);
    $objeto->setNome($POST['nome_objeto']);
    $objeto->setCaracteristicas($POST['caracteristicas']);
    $objeto->setHistoria($POST['historia_objeto']);
    $objeto->setTrivia($POST['trivia_objeto']);
    $objeto->save();


    header("Location: ../View/addObjeto.php");
    exit();
}
?>