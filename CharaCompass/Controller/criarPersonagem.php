<?php
$acao = isset($_GET['acao']) ? $_GET['acao'] : '';

if ($acao === 'criar') {
    include_once '../Model/Personagem.class.php';
    $personagem = new Personagem();
    $personagem->setId($POST['id_personagem']);
    $personagem->setNome($POST['nome_personagem']);
    $personagem->setInfo($POST['info_personagem']);
    $personagem->setPersonalidade($POST['personalidade']);
    $personagem->setHistoria($POST['historia']);
    $personagem->setTrivia($POST['trivia_personagem']);
    $objeto->save();


    header("Location: ../View/addPersonagem.php");
    exit();
}
?>