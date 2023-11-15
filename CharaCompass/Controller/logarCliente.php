<?php
$acao = isset($_GET['acao']) ? $_GET['acao'] : '';
include_once '../Model/Cliente.class.php';

if ($acao === 'login') {
    if ($_SERVER["REQUEST_METHOD"] == "POST") { 
        if (!empty($_POST['email']) && !empty($_POST['senha']))  { 
                $email = $_POST['email']; 
                $pdo = conexao(); 
                $query = "SELECT * FROM cliente where email_cliente = :email limit 1 "; 
                $stmt = $pdo->prepare($query); 
                $stmt->bindParam(':email', $email);  
                $stmt->execute(); 

                if($stmt->rowCount() == 1) { 
                    $usuario = $stmt->fetch(); 
                    $senha = $_POST['senha']; 
                    $senha02 = $usuario['senha_cliente']; 

                    if(password_verify($senha, $senha02)) { 
                        session_start(); 
                        session_regenerate_id(); 
                        $_SESSION['id'] = $usuario['id_cliente']; 
                        $_SESSION['nome'] = $usuario['nome_cliente']; 
                        header("Location: ../View/inicialUsuario.php");
                    } else { /* Senha errada*/
                        header("Location: ../View/login.php");
                        echo "Senha incorreta";
                        exit();
                    }           
                } else /*se o email não existe*/ {
                    header("Location: ../View/login.php");
                    echo "Usuário não encontrado";
                    exit();
                }
            }     
        } else { 
            header("Location: ../View/login.php");
            echo "outro erro";
            exit();
        }
    }
?>