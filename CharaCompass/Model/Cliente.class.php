    <?php
    include_once '../Controller/Conexao.php';
    include_once 'Model.trait.php';

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
                $novasenha = password_hash($this->senha, PASSWORD_DEFAULT);
                $stmt1 = $pdo->prepare('INSERT INTO cliente (nome_cliente, email_cliente, senha_cliente) VALUES(:nome, :email, :senha)');
                $stmt1->execute([
                    ':nome' => $this->nome,
                    ':email' => $this->email,
                    ':senha' => $novasenha
                ]);
                return true;
            } catch(Exception $e) { 
                echo $e->getMessage();
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

        public function login(){
            $pdo = conexao();
            var_dump($this);
            try{
                $stmt = $pdo->prepare('SELECT id_cliente, email_cliente, senha_cliente FROM CLIENTE WHERE email_cliente = :email');
                $stmt->execute([
                    ':email' => $this->email,
                ]);
                if ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                    if(password_verify($this->senha, $row['senha_cliente'])){
                        $_SESSION ['cliente'] = $row['id_cliente'];
                        $_SESSION ['email'] = $row['email_cliente'];
                        header('Location:../view/inicialUsuario.html');
                        exit();
                    } else{
                        echo 'Erro no login';
                    }
                } else {
                    echo 'Erro no login';
                }
                return false;   
            }catch(Exception $e){
                echo $e->getMessage();
                return false;
            }
        }
    }

    ?>