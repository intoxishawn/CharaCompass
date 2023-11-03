<?php
include_once 'Controller/Conexao.php';

class Personagem{

    use Model;

    private $id; 
    private $nome;
    private $info;
    private $personalidade;
    private $historia;
    private $trivia;

    //get e set no model

    public function save()
        {
            $pdo = conexao();
            try {
                $stmt1 = $pdo->prepare('INSERT INTO personagem (nome_personagem, info_personagem, personalidade, historia, trivia_personagem) VALUES(:nome, :info, :personalidade, :historia, :trivia)');
                $stmt1->execute([
                    ':nome' => $this->nome,
                    ':info' => $this->info,
                    ':personalidade' => $this->personalidade,
                    ':historia' => $this->historia,
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
                $stmt = $pdo ->prepare('UPDATE personagem SET nome_personagem = :nome, info_personagem = :info, personalidade = :personalidade, historia = :historia, trivia_personalidade = :trivia WHERE id_personagem = :id');
                $stmt->execute([
                    ':nome' => $this->nome,
                    ':info' => $this->info,
                    ':personalidade' => $this->personalidade,
                    'historia' => $this->historia,
                    'trivia' => $this->trivia,
                    ':id' => $this->id
                ]);
                return true;
            }catch(Exception $e){
                return false;
            }
        }

        public static function delete($id){
            $pdo = conexao();
            $stmt = $pdo->prepare('DELETE FROM personagem WHERE id = :id');
            $stmt -> execute([':id'=>$id]);
        }

        public static function getAll(){
            $pdo = conexao();
            $lista = [];
            foreach ($pdo->query('SELECT * FROM personagem') as $linha){
                $personagem = new Personagem();
                $personagem->setId($linha['id_personagem']);
                $personagem->setNome($linha['nome_personagem']);
                $personagem->setInfo($linha['info_personagem']);
                $personagem->setPersonalidade($linha['personalidade']);
                $personagem->setHistoria($linha['historia']);
                $personagem->setTrivia($linha['trivia_personagem']);
    
                $lista[] = $personagem;
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