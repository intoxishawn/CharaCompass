<?php
include_once 'Controller/Conexao.php';

class Mundos{

    use Model;

    private $id;
    private $nome;
    private $info;
    private $trivia;

    //get e set em trait

    public function save()
        {
            $pdo = conexao();
            try {
                $stmt1 = $pdo->prepare('INSERT INTO mundo (nome_mundo, info_mundo, trivia_mundo) VALUES(:nome, :info, :trivia)');
                $stmt1->execute([
                    ':nome' => $this->nome,
                    ':info' => $this->info,
                    ':trivia' => $this->trivia
                ]);
                return true;
            } catch(Exception $e) { 
                echo $e->getMessage();
                return false;
            }
        }

        public function update(){
            $pdo = conexao();
            try{
                $stmt = $pdo ->prepare('UPDATE mundo SET nome_mundo = :nome, info_mundo = :info, trivia_mundo = :trivia WHERE id_mundo = :id');
                $stmt->execute([
                    ':nome' => $this->nome,
                    ':info' => $this->info,
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
            $stmt = $pdo->prepare('DELETE FROM mundo WHERE id = :id');
            $stmt -> execute([':id'=>$id]);
        }

        public static function getAll(){
            $pdo = conexao();
            $lista = [];
            foreach ($pdo->query('SELECT * FROM mundo') as $linha){
                $mundo = new Mundo();
                $mundo-> setId($linha['id_mundo']);
                $mundo->setNome($linha['nome_mundo']);
                $mundo->setInfo($linha['info_mundo']);
                $mundo->setTrivia($linha['trivia_mundo']);

                $lista[] = $mundo;
            } return $lista;
        }

        public static function getOne($id){
            $pdo = conexao();
            $stmt = $pdo->prepare('SELECT * FROM mundo WHERE id_mundo = :id');
            $stmt->execute([
                ':id' => $id
            ]);
            $mundo = $stmt->fetch(PDO::FETCH_ASSOC);
    
            return $mundo;
        }

}
?>