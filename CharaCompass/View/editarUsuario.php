<?php
session_start();
if (session_status() === PHP_SESSION_ACTIVE) {
   
}else{
    header("Location: login.php");
    exit();
}

include_once '../Controller/Conexao.php';
include_once '../Model/Cliente.class.php';

$id = $_SESSION['id'];

if (!is_numeric($id) || $id <= 0) {
    echo "ID inválido";
    exit();
}

include_once '../Model/Cliente.class.php';

$id = $_SESSION['id'];
$pfp = Cliente::getOne($id);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
    <script src="editarUsuario.js"></script>
    <link rel="icon" type="image/x-icon" href="../View/Imagens/favicon-32x32.png">
    <title>Perfil do Usuário</title>
</head>
<body>
     <header>
          <h1> CharaCompass </h1>
          <p> Perfil </p>
      </header>
  
      <nav>
          <button class="nav_button" onclick="abreGaleria()"> Galeria </button>
          <button class="nav_button" onclick="abrePersonagens()"> Personagens </button>
          <button class="nav_button" onclick="abreMundos()"> Mundos </button>
          <button class="nav_button" onclick="abreObjetos()"> Objetos </button>
      </nav>
  
      <div id="main">
          <div class="explicacao01">
            <br>
            <form action="../Controller/atualizarCliente.php?acao=atualizar" method="POST" enctype="multipart/form-data">
                <?php 
            
                echo "<div class=\"tituloPagina\">";
                echo '<img src="' . $pfp['pfp_caminho'] . '">';
                echo "</div>";
                ?>

                <br>
                <h3>Alterar foto de perfil</h3>
                <br>
                <input type="file" name="pfp" accept="image/*" class="input-imagem">

                <h3> Nome de Usuário: </h3>
                <input type="text" required value="<?php echo $_SESSION['nome'];?>" name="username">
                <br><br>
                <input type="submit" value="Salvar">
            </form>
                <br><br><br>
                <button class="voltar" onclick="cancelarEdicao()"> Cancelar </button>
              </div>
        </div>
   
        <footer>
    <h3> CharaCompass - 2023 </h3>
    <p> A bússola do seu mundo para seus personagens </p>
   </footer>    

   <script>
      function cancelarEdicao() {
        var confirmacao = confirm("Tem certeza que deseja voltar? Sua edição não será salva!");
        if (confirmacao) {
            window.location.href ="inicialUsuario.php";
        }
    }
   </script>
</body>
</html>