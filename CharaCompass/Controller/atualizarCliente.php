<?php
session_start();

$acao = isset($_GET['acao']) ? $_GET['acao'] : '';
$id = isset($_GET['id']) ? $_GET['id'] : '';

if ($acao === 'atualizar' && isset($_POST['username'])) {
    include_once '../Model/Cliente.class.php';

    if (isset($_SESSION['id'])) {
        $id_usuario = $_SESSION['id'];
        $novo_nome = $_POST['username'];

        $cliente = new Cliente();
        $cliente->__set("id", $id_usuario);
        $cliente->__set("nome", $novo_nome);

        if(isSet($_FILES['pfp'])){
            $foto = Cliente::saveFile($_FILES['pfp']);
            $cliente->__set("pfp_caminho", $foto);
        }

        $cliente->update();

        $_SESSION['nome'] = $novo_nome;

        header("Location: ../View/inicialUsuario.php");
        exit();
    } else {
        echo "Sessão não está definida.";
    }
}
?>
