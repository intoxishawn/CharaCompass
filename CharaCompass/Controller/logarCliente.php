<?php
$acao = isset($_GET['acao']) ? $_GET['acao'] : '';
include_once '../Model/Cliente.class.php';

if ($acao === 'login') {
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") { 
  
  
        if(isset($_POST['email']) || isset($_POST['senha'])) { 

        if(strlen($_POST['email']) == 0) { 
            echo "Insira seu email"; 

        } else if(strlen($_POST['senha']) == 0) { 
            echo "Insira sua senha"; 

            } else { 

            $email = $_POST['email']; 


            $pdo = conexao(); 
            $query = "SELECT * FROM cliente where email_cliente = :email limit 1 "; 
            $stmt = $pdo->prepare($query); 
            $stmt->bindParam(':email', $email);  
            $stmt->execute(); 

                if($stmt->rowCount() == 1) { 

                     $usuario = $stmt->fetch(); 

                     $senha = $_POST['senha']; 
                     $senha02 = $usuario['senha']; 

                     if(password_verify($senha, $senha02)){ 

                        session_start(); 
                        session_regenerate_id(); 

                        $_SESSION['id'] = $usuario['id']; 
                        $_SESSION['nome'] = $usuario['nome_cliente']; 

                        header("Location: ../View/inicialUsuario.html"); 

                     }else { 

                        echo "Senha incorreta :("; 
                     }           

            }else{ 
                echo "Este usuário não existe :("; 
            } 
        }     
    }else { 
    echo "Seu E-mail ou senha está(ão) incorreto(s) :("; 
} 
} 

}
    
?>