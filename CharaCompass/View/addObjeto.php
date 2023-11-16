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
    <title>Crie um objeto</title>
</head>
<body>
    <div>
        <h1> CharaCompass </h1>
        <p> A bússola do seu mundo para seus personagens </p>
    </div>

    <div>
        <h2> Painel de objeto </h2>
    </div>

    <div>
        <form action="../Controller/objetoController.php?acao=criar" method="POST" enctype="multipart/form-data">
            <h3> Nome do Objeto: </h3>
            <input type="text" name="nome_obj" id="nome_obj" required>
            <br>
            <div class="editorTexto">
                <h3> Características do Objeto: </h3>
                <textarea class ="summernote" name="c_obj" id="c_obj"></textarea>
            </div>
            <div class="editorTexto">
                <h3> História do Objeto: </h3>
                <textarea class ="summernote" name="historia_obj" id="historia_obj"></textarea>
            </div>
            <div class="editorTexto">
                <h3> Trivia do Objeto: </h3>
                <textarea class ="summernote" name="trivia_obj" id="trivia_obj"></textarea>
            </div>

            <br>

            <h3>Como seria o seu objeto?</h3>
            <input type="file" name="imagem_objeto" accept="image/*" class="input-imagem">

            <br><br><br>
            
            <input type="submit" value="Criar Ficha!">
        </form>
    </div>
    <br><br>
    <button class="voltar" onclick="cancelarCriacao()"> Cancelar </button>

    <footer>
        <h3> CharaCompass - 2023 </h3>
        <p> A bússola do seu mundo para seus personagens </p>
    </footer>

    <script>
        $('.summernote').summernote({
        placeholder: 'Escreva aqui...',
        tabsize: 1,
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
            window.location.href ="objetosUsuario.php";
        }
    }
    </script>
</body>
</html>