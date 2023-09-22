<?php
include_once 'Controller/Conexao.php';

class Cliente{

    use Model;
    private $id;
    private $nome;
    private $email;
    private $senha;
    private $biografia;

    //get e set no trait

   //save
    public function save()
    {
        $pdo = conexao();
        try {
            $stmt1 = $pdo->prepare('INSERT INTO cliente (nome_cliente, email_cliente, senha_cliente, biografia_cliente) VALUES(:nome, :email, :senha, :biografia)');
            $stmt1->execute([
                ':nome' => $this->nome,
                ':email' => $this->email,
                ':senha' => $this->senha,
                ':biografia' => $this->biografia
            ]); 
            $this->id = $pdo->lastInsertId();
            return true;
        } catch(Exception $e) { 
            return false;
        }
    }

    //update
    public function update(){
        $pdo = conexao();
        try{
            $stmt = $pdo ->prepare('UPDATE cliente SET nome_cliente = :nome, email_cliente = :email, senha_cliente = :senha, 
            biografia_cliente = :biografia WHERE id_cliente = :id');
            $stmt->execute([
                ':nome' => $this->nome,
                ':email' => $this->email,
                ':senha' => $this->senha,
                ':biografia' => $this->biografia,
                ':id' => $this->id
            ]);
            return true;
        }catch(Exception $e){
            return false;
        }
    }

    //delete
    public static function delete($id){
        $pdo = conexao();
        $stmt = $pdo->prepare('DELETE FROM cliente WHERE id = :id');
        $stmt -> execute([':id'=>$id]);
    }

    //getAll
    public static function getAll(){
        $pdo = conexao();
        $lista = [];
        foreach ($pdo->query('SELECT * FROM cliente') as $linha){
            $cliente = new Cliente();
            $cliente-> setId($linha['id_cliente']);
            $cliente->setNome($linha['nome_cliente']);
            $cliente->setEmail($linha['email_cliente']);
            $cliente->setSenha($linha['senha_cliente']);
            $cliente->setBiografia($linha['biografia_cliente']);

            $lista[] = $cliente;
        } return $lista;
    }
}

?>