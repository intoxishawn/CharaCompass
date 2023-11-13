<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
    <script src="perfilUsuario.js"></script>
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
              <img id="pfp" src="Imagens/avatarplaceholder.png" alt="Imagem do CharaCompass"></a>
              <div class="conteudo">
                  <p id="username"><?php echo $_SESSION['nome'] ?></p>
                  <p>Biografia</p>
              </div>
            </div>
            <br><br>
            <div id="menu_perfil">
                <button class="nav_perfil" onclick="abreEditar()"> Editar </button>
                <button class="nav_perfil" onclick="desconectar()"> Desconectar </button>
              </div>
        </div>
   <footer>
    <h3> CharaCompass - 2023 </h3>
    <p> A bússola do seu mundo para seus personagens </p>
   </footer>    
</body>
</html>