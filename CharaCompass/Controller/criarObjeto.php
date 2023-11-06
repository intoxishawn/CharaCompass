<?php
$acao = isset($_GET['acao']) ? $_GET['acao'] : '';

if ($acao === 'criar') {
    include_once '../Model/Objeto.class.php';
    session_start(); 
    $clienteId = $_SESSION["id"];

    $objeto = new Objeto();
    $objeto->__set("nome", $_POST['nome_obj']);
    $objeto->__set("caracteristicas", $_POST['c_obj']);
    $objeto->__set("historia", $_POST['historia_obj']);
    $objeto->__set("trivia", $_POST['trivia_obj']);
    $objeto->__set("cliente_id", $clienteId);
    $objeto->save();
    
    header("Location: ../View/index.html");
    exit();
    
}
?>