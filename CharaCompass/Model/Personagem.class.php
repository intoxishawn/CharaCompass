<?php
include_once '../Controller/Conexao.php';
include_once 'Model.trait.php';

class Personagem{

    use Model;

    private $id; 
    private $nome;
    private $info;
    private $personalidade;
    private $historia;
    private $trivia;
    private $cliente_id;

    //get e set no model

    /* =========== MODEL  =========== */
    public function __construct($id = null, $nome = null, $info = null, $personalidade = null, $historia = null, $trivia = null, $cliente_id = null) {        
        $this->id = $id;
        $this->nome = $nome;
        $this->info = $info;
        $this->personalidade = $personalidade;
        $this->historia = $historia;
        $this->trivia = $trivia;
        $this->cliente_id = $cliente_id;                
    }

    /* =========== GET  =========== */
    
        /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getNome()
    {
        return $this->nome;
    }

        /**
     * @return mixed
     */
    public function getInfo()
    {
        return $this->info;
    }
    
    /**
     * @return mixed
     */
    public function getPersonalidade()
    {
        return $this->personalidade;
    }

    /**
     * @return mixed
     */
    public function getHistoria()
    {
        return $this->historia;
    }

        /**
     * @return mixed
     */
    public function getTrivia()
    {
        return $this->trivia;
    }

    /**
     * @return mixed
     */
    public function getCliente_id()
    {
        return $this->cliente_id;
    }

    /* =========== SET  =========== */

     /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

     /**
     * @param mixed $nome
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    /**
     * @param mixed $info
     */
    public function setInfo($info)
    {
        $this->info = $info;
    }

     /**
     * @param mixed $personalidade
     */
    public function setPersonalidade($personalidade)
    {
        $this->personalidade = $personalidade;
    }

        /**
     * @param mixed $historia
     */
    public function setHistoria($historia)
    {
        $this->historia = $historia;
    }

    /**
     * @param mixed $trivia
     */
    public function setTrivia($trivia)
    {
        $this->trivia = $trivia;
    }

    /**
     * @param mixed $cliente_id
     */
    public function setCliente_id($cliente_id)
    {
        $this->cliente_id = $cliente_id;
    }

    /* =========== CRUD =========== */

    public function save()
        {
            $pdo = conexao();
            try {
                $stmt1 = $pdo->prepare('INSERT INTO personagem (nome_personagem, info_personagem, personalidade, historia, trivia_personagem, cliente_id) VALUES(:nome, :info, :personalidade, :historia, :trivia, :cliente_id)');
                $stmt1->execute([
                    ':nome' => $this->nome,
                    ':info' => $this->info,
                    ':personalidade' => $this->personalidade,
                    ':historia' => $this->historia,
                    ':trivia' => $this->trivia,
                    ':cliente_id' => $this->cliente_id
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
            $stmt = $pdo->prepare('DELETE FROM personagem WHERE id_personagem = :id');
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
            $stmt = $pdo->prepare('SELECT * FROM personagem WHERE id_personagem = :id');
            $stmt->execute([
                ':id' => $id
            ]);
            $personagem = $stmt->fetch(PDO::FETCH_ASSOC);
    
            return $personagem;
        }

    /* =========== LISTAGEM  =========== */
    function listarPersonagem() {
        try {
            $pdo = conexao();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
            $stmt = $pdo->prepare("SELECT id_personagem, nome_personagem, info_personagem, personalidade, historia, trivia_personagem, cliente_id FROM personagem ORDER BY nome_personagem");
            $stmt->execute();
    
            $linha = $stmt->fetch(PDO::FETCH_ASSOC);
    
            if (!$linha) {
                echo '<object type="image/svg+xml" data="../View/Imagens/chicken.svg" width="100" height="100"></object>';
                echo '<br>';
                echo "Nada aqui além de nós e galinhas!";
            } else {
                echo "<div id=\"list\" class=\"row\">";
                echo "<div class=\"table-responsive col-md-12\">";
                echo "<table border=1 class=\"table table-striped\" cellspacing=\"0\" cellpadding=\"0\">";
                echo "<thead>";
                echo "<tr>";
                echo "<th>id_personagem</th>";
                echo "<th>nome_personagem</th>";
                echo "<th>info_personagem</th>";
                echo "<th>personalidade</th>";
                echo "<th>historia</th>";
                echo "<th>trivia_personagem</th>";
                echo "<th>cliente_id</th>";
                echo "<th class=\"actions\">Ações</th>";
                echo "<th class=\"actions\">Ações</th>";
                echo "<th class=\"actions\">Ações</th>";
                echo "</tr>";
                echo "</thead>";
                echo "<tbody>";
    
                do {
                    echo "<tr>";
                    echo "<td align=left>". $linha['id_personagem'] ."</td>";
                    echo "<td align=left>". $linha['nome_personagem'] ."</td>";
                    echo "<td align=left>". $linha['info_personagem'] ."</td>";
                    echo "<td align=left>". $linha['personalidade'] ."</td>";
                    echo "<td align=left>". $linha['historia'] ."</td>";
                    echo "<td align=left>". $linha['trivia_personagem'] ."</td>";
                    echo "<td align=left>". $linha['cliente_id'] ."</td>";
                    echo "<td>";
                    echo "<a class=\"btn btn-success btn-xs\" href=\"perfilPersonagem.php?id=". $linha['id_personagem'] ."\">Visualizar</a>";
                    echo "</td>";
                    echo "<td>";
                    echo "<a class=\"btn btn-warning btn-xs\" href=\"editarPersonagem.php?id=". $linha['id_personagem'] ."\">Editar</a>";
                    echo "</td>";
                    echo "<td>";
                    echo '<button class="btn btn-danger btn-xs" onclick="confirmarExclusao(' . $linha['id_personagem'] . ')">Excluir</button>';
                    echo "</td>";
                    echo "</tr>";
                } while ($linha = $stmt->fetch(PDO::FETCH_ASSOC));
    
                echo "</tbody>";
                echo "</table>";
                echo "</div>";
                echo "</div>";
            }
        } catch(PDOException $e) {
            echo 'Erro na operação de listar personagens';
        }
    }
}
?>