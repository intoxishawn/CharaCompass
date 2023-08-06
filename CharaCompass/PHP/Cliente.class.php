<?php
include_once 'Conexao.php';

class Objetos{

    use Model;

    private $id;
    private $nome;
    private $email;
    private $senha;
    private $biografia;

    public function save()
    {
        $pdo = conexao();
        try{
            $stmt1 = $pdo->prepare('INSERT INTO Cliente (nome_cliente, email_cliente, senha_cliente) VALUES(:nome, :email, :senha)');
            $stmt1->execute([
                ':nome' => $this->nome,
                ':email' => $this->email,
                ':senha' => $this->senha
            ]); 
            $this->id = $pdo->lastInsertId();
            return true;
        }catch(Exception $e){ 
            return false;
        }
    }
}

?>