<?php
include_once 'Conexao.php';

class Cliente{

    private $id;
    private $nome;
    private $email;
    private $senha;
    private $biografia;

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getNome(){
        return $this->nome;
    }

    public function setNome($nome){
        $this->nome = $nome;
    }

    public function getEmail(){
        return $this->email;
    }

    public function setEmail($email){
        $this->email = $email;
    }

    public function getSenha(){
        return $this->senha;
    }

    public function setSenha($senha){
        $this->senha = $senha;
    }

    public function save()
    {
        $pdo = conexao();
        try {
            $stmt1 = $pdo->prepare('INSERT INTO cliente (nome_cliente, email_cliente, senha_cliente) VALUES(:nome, :email, :senha)');
            $stmt1->execute([
                ':nome' => $this->nome,
                ':email' => $this->email,
                ':senha' => $this->senha
            ]); 
            $this->id = $pdo->lastInsertId();
            return true;
        } catch(Exception $e) { 
            return false;
        }
    }
}

?>