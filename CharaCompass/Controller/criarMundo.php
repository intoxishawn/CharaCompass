<?php
$acao = isset($_GET['acao']) ? $_GET['acao'] : '';

if ($acao === 'criarMundo') {
    include_once '../Model/Mundo.class.php';
    $mundo = new Mundo();
    $mundo->setNome($_POST['new_mundoname']);
    $mundo->setInfo($_POST['new_mundoinfo']);
    $mundo->setTrivia($_POST['new_mundotrivia']);
    $mundo->save();
    
    exit();
}
?>