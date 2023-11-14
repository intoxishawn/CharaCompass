<?php


if(isSet($_SESSION)){
    session_start();
}else if(!isSet($_SESSION)){
    header("Location: login.php");
}

include_once '../Controller/Conexao.php';
include_once '../Model/Objeto.class.php';

$id = isset($_GET['id']) ? $_GET['id'] : null;

if (!is_numeric($id) || $id <= 0) {
    echo "ID inválido";
    exit();
}

$objeto = Objeto::getOne($id);
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
    <title>Edite seu objeto</title>
</head>
<body>
    <div>
        <h1> CharaCompass </h1>
        <p> A bússola do seu mundo para seus personagens </p>
    </div>

    <div>
        <h2> Painel do Objeto </h2>
    </div>

    <div>
        <form action="../Controller/objetoController.php?acao=atualizar" method="POST">
        <input type="hidden" name="id" value="<?php echo $objeto['id_objeto']; ?>">
        
            <h3> Nome do Objeto: </h3>
            <input type="text" name="nome_edit" id="nome_edit" value="<?php echo $objeto['nome_objeto']; ?>" required>
            <br>
            <div class="editorTexto">
                <h3> Características do Objeto: </h3>
                <textarea class ="summernote" name="c_edit" id="c_edit"><?php echo $objeto['caracteristicas']; ?></textarea>
            </div>
            <div class="editorTexto">
                <h3> História do Objeto: </h3>
                <textarea class ="summernote" name="historia_edit" id="historia_edit"><?php echo $objeto['historia_objeto']; ?></textarea>
            </div>
            <div class="editorTexto">
                <h3> Trivia do Objeto: </h3>
                <textarea class ="summernote" name="trivia_edit" id="trivia_edit"><?php echo $objeto['trivia_objeto']; ?></textarea>
            </div>

            <br>

            <h3>Como seria o seu objeto?</h3>
            <input type="file" accept="image/*" multiple name="img_obj">

            <br><br><br>
            
            <input type="submit" value="Atualizar">
        </form>
        <br>
    </div>

    <footer>
        <h3> CharaCompass - 2023 </h3>
        <p> A bússola do seu mundo para seus personagens </p>
    </footer>

    <script>
        $('.summernote').summernote({
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
    </script>
</body>
</html>