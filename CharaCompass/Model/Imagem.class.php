<?php
include_once 'Controller/Conexao.php';

class Imagem{

    use Model;

    private $id;
    private $caminho;

    //get e set em trait

    public function save()
        {
            $pdo = conexao();
            try {
                $stmt1 = $pdo->prepare('INSERT INTO imagem (id_imagem, caminho_imagem) VALUES(:caminho)');
                $stmt1->execute([
                    ':caminho_imagem' => $this->caminho
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
                $stmt = $pdo ->prepare('UPDATE imagem SET caminho_imagem = :caminho WHERE id_imagem = :id');
                $stmt->execute([
                    ':caminho_imagem' => $this->caminho,
                    ':id' => $this->id
                ]);
                return true;
            }catch(Exception $e){
                return false;
            }
        }
        
        public static function delete($id){
            $pdo = conexao();
            $stmt = $pdo->prepare('DELETE FROM imagem WHERE id = :id');
            $stmt -> execute([':id'=>$id]);
        }

        public static function getAll(){
            $pdo = conexao();
            $lista = [];
            foreach ($pdo->query('SELECT * FROM imagem') as $linha){
                $imagem = new Mundo();
                $imagem-> setId($linha['id_imagem']);
                $imagem->setCaminho($linha['caminho_imagem']);

                $lista[] = $imagem;
            } return $lista;
        }

        public static function getOne($id){
            $pdo = conexao();
            $stmt = $pdo->prepare('SELECT * FROM imagem WHERE id_imagem = :id');
            $stmt->execute([
                ':id' => $id
            ]);
            $imagem = $stmt->fetch(PDO::FETCH_ASSOC);
    
            return $imagem;
        }

        public static function saveFile($img) {
            $imgName = md5(uniqid(rand(), true)) . '.png';
    
            $imgPath = __DIR__.'/../View/uploads/' . $imgName;
    
            move_uploaded_file($img['tmp_name'], $imgPath);
    
            return 'Uploads/' .$imgName;
        }

}
?>