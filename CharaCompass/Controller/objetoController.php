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

    if(isSet($_FILES['imagem_objeto'])){
        $foto = Objeto::saveFile($_FILES['imagem_objeto']);
        $objeto->__set("imagem", $foto);
    }

    $objeto->save();
    
    header("Location: ../View/objetosUsuario.php");
    exit();
} else if($acao === 'atualizar'){
    include_once '../Model/Objeto.class.php';
    $objeto = new Objeto();
    $objeto->__set("nome", $_POST['nome_edit']);
    $objeto->__set("caracteristicas", $_POST['c_edit']);
    $objeto->__set("historia", $_POST['historia_edit']);
    $objeto->__set("trivia", $_POST['trivia_edit']);

    if(isSet($_FILES['imagem_objeto'])){
        $foto = Objeto::saveFile($_FILES['imagem_objeto']);
        $objeto->__set("imagem", $foto);
    }

    $objeto->__set("id", $_POST['id']);
    $objeto->update();
    header("Location: ../View/objetosUsuario.php");
    exit();
}else if($acao === 'deletar'){
    include_once '../Model/Objeto.class.php';
    Objeto::delete($_REQUEST['id']);
    header("Location: ../View/objetosUsuario.php");
    exit();
}
?>