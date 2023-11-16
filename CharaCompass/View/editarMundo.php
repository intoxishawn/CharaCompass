<?php
session_start();
if (session_status() === PHP_SESSION_ACTIVE) {
    // Sessão está ativa, o usuário está logado
} else {
    // Sessão não está ativa, redirecione para a página de login
    header("Location: login.php");
    exit(); // Encerrar o script após o redirecionamento
}

include_once '../Controller/Conexao.php';
include_once '../Model/Mundo.class.php';

$id = isset($_GET['id']) ? $_GET['id'] : null;

if (!is_numeric($id) || $id <= 0) {
    echo "ID inválido";
    exit();
}

$mundo = Mundo::getOne($id);
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
    <title>Edite seu mundo</title>
</head>
<body>
    <div>
        <h1> CharaCompass </h1>
        <p> A bússola do seu mundo para seus personagens </p>
    </div>

    <div>
        <h2> Painel do Mundo </h2>
    </div>

    <div>
        <form action="../Controller/mundoController.php?acao=atualizar" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $mundo['id_mundo']; ?>">
            
            <h3> Nome do Mundo: </h3>
            <input type="text" name="ed_name" id="ed_name" value= "<?php echo $mundo['nome_mundo']; ?>" required>
            <br><br>

            <div class="editorTexto">
                <h3> Informações do mundo: </h3>
                <textarea class ="summernote" name="ed_info" id="ed_info"><?php echo $mundo['info_mundo']; ?></textarea>
            </div>

            <div class="editorTexto">
                <h3> Trivias do mundo: </h3>
                <textarea class="summernote" name="ed_trivia" id="ed_trivia"><?php echo $mundo['trivia_mundo']; ?></textarea>
            </div>

            <h3> Como seria seu mundo?</h3>
            <input type="file" name="imagem_ed" accept="image/*" class="input-imagem">
            <br><br>
            <input type="submit" value="Atualizar">
        </form>
    </div>

    <footer>
        <h3> CharaCompass - 2023 </h3>
        <p> A bússola do seu mundo para seus personagens </p>
    </footer>

    <script>
        $('.summernote').summernote({
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