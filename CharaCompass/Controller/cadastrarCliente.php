<?php
session_start();

$acao = isset($_GET['acao']) ? $_GET['acao'] : '';

if ($acao === 'cadastrar') {
    include_once '../Model/Cliente.class.php';

    if (!empty($_POST['new_senha'])) {
        $newemail = $_POST['new_email'];

        $pdo = conexao();
        $query = "SELECT * FROM cliente WHERE email_cliente = :email";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':email', $newemail);
        $stmt->execute();

        if ($stmt->rowCount() == 0) {
            $cliente = new Cliente();
            $cliente->setNome($_POST['new_username']);
            $cliente->setEmail($_POST['new_email']);
            $cliente->setSenha($_POST['new_senha']);
            $cliente->save();

            header("Location: ../View/cadastro.php");
            exit();
        } else {
            $_SESSION['msg'] = "Este email já está em uso.";
            header("Location: ../View/cadastro.php");
            exit();
        }
    }
}
?>
