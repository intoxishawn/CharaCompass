<?php
include_once '../Controller/Conexao.php';
include_once 'Model.trait.php';

class Mundo{

    use Model;

    public $id;
    public $nome;
    public $info;
    public $trivia;
    public $cliente_id;

    public function __construct($id = null, $nome = null, $info = null, $trivia = null, $cliente_id = null) {        
        $this->id = $id;
        $this->nome = $nome;
        $this->info = $info;
        $this->trivia = $trivia;
        $this->cliente_id = $cliente_id;                
    } 
    
    
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

    //get e set em trait

    public function save()
        {
            $pdo = conexao();
            try {
                $stmt1 = $pdo->prepare('INSERT INTO mundo (nome_mundo, info_mundo, trivia_mundo, cliente_id) VALUES(:nome, :info, :trivia, :cliente_id)');
                $stmt1->execute([
                    ':nome' => $this->nome,
                    ':info' => $this->info,
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
            $stmt = $pdo->prepare('DELETE FROM mundo WHERE id_mundo = :id');
            $stmt->execute([':id' => $id]);
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
        
        function listarMundo() {
            try {
                $pdo = conexao();
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
                $stmt = $pdo->prepare("SELECT * FROM mundo ORDER BY nome_mundo");
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
                    echo "<th>id_mundo</th>";
                    echo "<th>nome_mundo</th>";
                    echo "<th>info_mundo</th>";
                    echo "<th>trivia_mundo</th>";
                    echo "<th>cliente_id</th>";
                    echo "<th class=\"actions\">Ações</th>";
                    echo "<th class=\"actions\">Ações</th>";
                    echo "<th class=\"actions\">Ações</th>";
                    echo "</tr>";
                    echo "</thead>";
                    echo "<tbody>";
        
                    do {
                        echo "<tr>";
                        echo "<td align=left>". $linha['id_mundo'] ."</td>";
                        echo "<td align=left>". $linha['nome_mundo'] ."</td>";
                        echo "<td align=left>". $linha['info_mundo'] ."</td>";
                        echo "<td align=left>". $linha['trivia_mundo'] ."</td>";
                        echo "<td align=left>". $linha['cliente_id'] ."</td>";
                        echo "<td>";
                        echo "<a class=\"btn btn-success btn-xs\" href=\"perfilMundo.php?id=". $linha['id_mundo'] ."\">Visualizar</a>";
                        echo "</td>";
                        echo "<td>";
                        echo "<a class=\"btn btn-warning btn-xs\" href=\"editarMundo.php?id=". $linha['id_mundo'] ."\">Editar</a>";
                        echo "</td>";
                        echo "<td>";
                        echo '<button class="btn btn-danger btn-xs" onclick="confirmarExclusao(' . $linha['id_mundo'] . ')">Excluir</button>';
                        echo "</td>";
                        echo "</tr>";
                    } while ($linha = $stmt->fetch(PDO::FETCH_ASSOC));
        
                    echo "</tbody>";
                    echo "</table>";
                    echo "</div>";
                    echo "</div>";
                }
            } catch(PDOException $e) {
                echo 'Erro na operação de listar mundo';
            }
        }
        
        }
?>