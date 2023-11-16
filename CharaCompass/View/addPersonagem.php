<?php
session_start();
if (session_status() === PHP_SESSION_ACTIVE) {
    // Sessão está ativa
} else {
    header("Location: login.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
    <link rel="icon" type="image/x-icon" href="../View/Imagens/favicon-32x32.png">
    <title> Painel do personagem</title>
</head>
<body>
    <div>
        <h1> CharaCompass </h1>
        <p> A bússola do seu mundo para seus personagens </p>
    </div>

    <div>
        <h2> Painel de personagem</h2>
    </div>

    <div>
        <form action="../Controller/personagemController.php?acao=criar" method="POST" enctype="multipart/form-data">
          <h3> Nome do personagem: </h3>
          <input type="text" name="nome_p" id="nome_p">
          
            <div class="editorTexto">
                <h3> Informações do personagem: </h3>
                <textarea class ="summernote" name="info_p" id="info_p"></textarea>
            </div>

            <div class="editorTexto">
                <h3> Personalidade: </h3>
                <textarea class ="summernote" name="personalidade" id="personalidade"></textarea>
            </div>

            <div class="editorTexto">
                <h3> História do personagem: </h3>
                <textarea class ="summernote" name="historia_p" id="historia_p"></textarea>
            </div>

            <div class="editorTexto">
                <h3> Trivia sobre o personagem: </h3>
                <textarea class ="summernote" name="trivia_p" id="trivia_p"></textarea>
            </div>

            <br><br>

            <h3> Como seu personagem é? </h3>
            <input type="file" name="imagem_personagem" accept="image/*" class="input-imagem">

            <br><br><br>
            <input type="submit" value="Criar Ficha!">
        </form>
        <br><br>
        <button class="voltar" onclick="cancelarCriacao()"> Cancelar </button>
    </div>

    <footer>
        <h3> CharaCompass - 2023 </h3>
        <p> A bússola do seu mundo para seus personagens </p>
    </footer>

    <script>
        $('.summernote').summernote({
        placeholder: 'Escreva aqui...',
        tabsize: 2,
        height: 100,
        toolbar: [
          ['style', ['style']],
          ['font', ['bold', 'underline']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['insert', ['link']]
        ]
      });

      function cancelarCriacao() {
        var confirmacao = confirm("Tem certeza que deseja voltar? Sua criação não será salva!");
        if (confirmacao) {
            window.location.href ="personagensUsuario.php";
        }
    }
    </script>
</body>
</html>