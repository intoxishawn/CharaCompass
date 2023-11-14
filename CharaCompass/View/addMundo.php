<?php

if(isSet($_SESSION)){
    session_start();
}else if(!isSet($_SESSION)){
    header("Location: login.php");
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
    <script src="/CharaCompass/View/adicao.js"></script>
    <title> Crie um mundo </title>
</head>
<body>
    <div>
        <h1> CharaCompass </h1>
        <p> A bússola do seu mundo para seus personagens </p>
    </div>

    <div>
        <h2> Painel de Mundo </h2>
    </div>

    <div>
        <form action="../Controller/mundoController.php?acao=criar" method="POST">
            <h3> Nome do Mundo: </h3>
            <input type="text" name="new_name" id="new_name" required>
            <br><br>

            <div class="editorTexto">
                <h3> Informações do mundo: </h3>
                <textarea class ="summernote" name="new_info" id="new_info"></textarea>
            </div>

            <div class="editorTexto">
                <h3> Trivias do mundo: </h3>
                <textarea class="summernote" name="new_trivia" id="new_trivia"></textarea>
            </div>
            <br>

            <h3> Como seria seu mundo?</h3>
            <input type="file" name="imagem_mundo" accept="image/*" class="input-imagem" multiple>

            <br><br><br>
            
            <input type="submit" value="Criar ficha!">
        </form>
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
    </script>
</body>
</html>