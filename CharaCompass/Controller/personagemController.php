<?php
$acao = isset($_GET['acao']) ? $_GET['acao'] : '';

if ($acao === 'criar'){
    include_once '../Model/Personagem.class.php';
    session_start();
    $clienteId = $_SESSION["id"];

    $personagem = new Personagem();
    $personagem->__set("nome", $_POST['nome_p']);
    $personagem->__set("info", $_POST['info_p']);
    $personagem->__set("personalidade", $_POST['personalidade']);
    $personagem->__set("historia", $_POST['historia_p']);
    $personagem->__set("trivia", $_POST['trivia_p']);
    $personagem->__set("cliente_id", $clienteId);
    $personagem->save();

    header("Location: ../View/index.html");
    exit();
    
}  else if($acao === 'atualizar'){
    include_once '../Model/Personagem.class.php';
    $personagem = new Personagem();
    $personagem->__set("nome", $_POST['nome_p']);
    $personagem->__set("info", $_POST['info_p']);
    $personagem->__set("personalidade", $_POST['personalidade']);
    $personagem->__set("historia", $_POST['historia_p']);
    $personagem->__set("trivia", $_POST['trivia_p']);
    $personagem->update();

    header("Location: ../View/index.html");
    exit();

} else if($acao === 'deletar'){
    include_once '../Model/Personagem.class.php';
    Personagem::delete($_REQUEST['id']);
    header("Location: ../View/index.html");
    exit();
}

?>