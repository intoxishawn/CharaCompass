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

    /* =========== MODEL  =========== */

    public function __construct($id = null, $nome = null, $caracteristicas = null, $historia = null, $trivia = null, $cliente_id = null) {        
        $this->id = $id;
        $this->nome = $nome;
        $this->caracteristicas = $caracteristicas;
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
    public function getCaracteristicas()
    {
        return $this->caracteristicas;
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
     * @param mixed $caracteristicas
     */
    public function setCaracteristicas($caracteristicas)
    {
        $this->caracteristicas = $caracteristicas;
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

    /* =========== CRUD  =========== */

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
            $stmt = $pdo->prepare('UPDATE objeto SET nome_objeto = :nome, caracteristicas = :caracteristicas, historia_objeto = :historia, trivia_objeto = :trivia WHERE id_objeto = :id');
            $stmt->execute([
                ':nome' => $this->nome,
                ':caracteristicas' => $this->caracteristicas,
                ':historia' => $this->historia,
                ':trivia' => $this->trivia,
                ':id' => $this->id
            ]);
            return true;
        } catch(Exception $e) {
            return false;
        }
    }

    public static function delete($id){
        $pdo = conexao();
        $stmt = $pdo->prepare('DELETE FROM objeto WHERE id_objeto = :id');
        $stmt -> execute([':id'=>$id]);
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

    /* =========== LISTAGEM  =========== */

    function listarObjeto() {
        try {
            $pdo = conexao();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $clienteId = $_SESSION['id'];
    
            $stmt = $pdo->prepare("SELECT * FROM objeto WHERE cliente_id = :clienteId ORDER BY nome_objeto");
            $stmt->bindParam(':clienteId', $clienteId);
            $stmt->execute();
    
            $linha = $stmt->fetch(PDO::FETCH_ASSOC);
    
            if (!$linha) {
                echo '<object type="image/svg+xml" data="../View/Imagens/chest.svg" width="100" height="100"></object>';
                echo '<br>';
                echo "Este espaço está mais vazio do que um baú de tesouros após uma visita do Capitão Gancho! <br>  Que tal criar um objeto para deixá-lo mais interessante?";
            } else {
                echo "<div id=\"list\" class=\"row\">";
                echo "<div class=\"table-responsive col-md-12\">";
                echo "<table border=1 class=\"table table-striped\" cellspacing=\"0\" cellpadding=\"0\">";
                echo "<thead>";
                echo "<tr>";
                echo "<th>id_objeto</th>";
                echo "<th>nome_objeto</th>";
                echo "<th>caracteristicas</th>";
                echo "<th>historia_objeto</th>";
                echo "<th>trivia_objeto</th>";
                echo "<th>cliente_id</th>";
                echo "<th class=\"actions\">Ações</th>";
                echo "<th class=\"actions\">Ações</th>";
                echo "<th class=\"actions\">Ações</th>";
                echo "</tr>";
                echo "</thead>";
                echo "<tbody>";
    
                do {
                    echo "<tr>";
                    echo "<td align=left>". $linha['id_objeto'] ."</td>";
                    echo "<td align=left>". $linha['nome_objeto'] ."</td>";
                    echo "<td align=left>". $linha['caracteristicas'] ."</td>";
                    echo "<td align=left>". $linha['historia_objeto'] ."</td>";
                    echo "<td align=left>". $linha['trivia_objeto'] ."</td>";
                    echo "<td align=left>". $linha['cliente_id'] ."</td>";
                    echo "<td>";
                    echo "<a class=\"btn btn-success btn-xs\" href=\"perfilObjeto.php?id=". $linha['id_objeto'] ."\">Visualizar</a>";
                    echo "</td>";
                    echo "<td>";
                    echo "<a class=\"btn btn-warning btn-xs\" href=\"editarObjeto.php?id=". $linha['id_objeto'] ."\">Editar</a>";
                    echo "</td>";
                    echo "<td>";
                    echo '<button class="btn btn-danger btn-xs" onclick="confirmarExclusao(' . $linha['id_objeto'] . ')">Excluir</button>';
                    echo "</td>";
                    echo "</tr>";
                } while ($linha = $stmt->fetch(PDO::FETCH_ASSOC));
    
                echo "</tbody>";
                echo "</table>";
                echo "</div>";
                echo "</div>";
            }
        } catch(PDOException $e) {
            echo 'Erro na operação de listar objetos';
        }
    }

}
?>