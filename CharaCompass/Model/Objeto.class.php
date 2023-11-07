<?php
include_once '../Controller/Conexao.php';
include_once 'Model.trait.php';

class Objeto{

    use Model;

    private $id;
    private $nome;
    private $caracteristicas;
    private $historia;
    private $trivia;
    private $cliente_id;

    //get e set no Model

    public function save(){
        $pdo = conexao();
        try{
            $stmt1 = $pdo->prepare('INSERT INTO objeto (nome_objeto, caracteristicas, historia_objeto, trivia_objeto, cliente_id) VALUES(:nome, :caracteristicas, :historia, :trivia, :cliente_id)');
            $stmt1->execute([
                ':nome' => $this->nome,
                ':caracteristicas' => $this->caracteristicas,
                ':historia' => $this->historia,
                ':trivia' => $this->trivia,
                ':cliente_id' => $this->cliente_id
            ]);
            return true;
        }catch(Exception $e) { 
            echo $e->getMessage();
            return false;
        }
    }

    public function update(){
        $pdo = conexao();
        try{
            $stmt = $pdo ->prepare('UPDATE objeto SET nome_objeto = :nome, caracteristicas = :caracteristicas, historia_objeto = historia, trivia_objeto = :trivia WHERE id_objeto = :id');
            $stmt->execute([
                ':nome' => $this->nome,
                ':caracteristicas' => $this->caracteristas,
                ':historia' => $this->historia,
                ':trivia' => $this->trivia,
                ':id' => $this->id
            ]);
            return true;
        }catch(Exception $e){
            return false;
        }
    }

    public static function delete($id){
        $pdo = conexao();
        $stmt = $pdo->prepare('DELETE FROM objeto WHERE id = :id');
        $stmt -> execute([':id'=>$id]);
    }

    public static function getAll(){
        $pdo = conexao();
        $lista = [];
        foreach ($pdo->query('SELECT * FROM objeto') as $linha){
            $objeto = new Objeto();
            $objeto-> setId($linha['id_mundo']);
            $objeto->setNome($linha['nome_objeto']);
            $objeto->setCaracteristicas($linha['caracteristicas']);
            $objeto->setHistoria($linha['historia_objeto']);
            $objeto->setTrivia($linha['trivia_objeto']);

            $lista[] = $objeto;
        } return $lista;
    }

    public static function getOne($id){
        $pdo = conexao();
        $stmt = $pdo->prepare('SELECT * FROM objeto WHERE id_objeto = :id');
        $stmt->execute([
            ':id' => $id
        ]);
        $objeto = $stmt->fetch(PDO::FETCH_ASSOC);

        return $objeto;
    }

}
?>