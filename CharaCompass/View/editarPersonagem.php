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
include_once '../Model/Personagem.class.php';

$id = isset($_GET['id']) ? $_GET['id'] : null;

if (!is_numeric($id) || $id <= 0) {
echo "ID inválido";
exit();
}

$personagem = Personagem::getOne($id);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
    <link rel="icon" type="image/x-icon" href="../View/Imagens/favicon-32x32.png">
    <title>Edite seu personagem</title>
</head>
<body>
    <div>
        <h1> CharaCompass </h1>
        <p> A bússola do seu mundo para seus personagens </p>
    </div>

    <div>
        <h2> Painel do Personagem </h2>
    </div>

    <div>
        <form action="../Controller/personagemController.php?acao=atualizar" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id_personagem" value="<?php echo $personagem['id_personagem']; ?>">
        
            <h3> Nome do personagem: </h3>
            <input type="text" name="nome_edit" id="nome_edit" value= "<?php echo $personagem['nome_personagem']; ?>">
          
            <div class="editorTexto">
                <h3> Informações do personagem: </h3>
                <textarea class ="summernote" name="info_edit" id="info_edit"><?php echo $personagem['info_personagem']; ?></textarea>
            </div>

            <div class="editorTexto">
                <h3> Personalidade: </h3>
                <textarea class ="summernote" name="personalidade_edit" id="personalidade_edit"><?php echo $personagem['personalidade']; ?></textarea>
            </div>

            <div class="editorTexto">
                <h3> História do personagem: </h3>
                <textarea class ="summernote" name="historia_edit" id="historia_edit"><?php echo $personagem['historia']; ?></textarea>
            </div>

            <div class="editorTexto">
                <h3> Trivia sobre o personagem: </h3>
                <textarea class ="summernote" name="trivia_edit" id="trivia_edit"><?php echo $personagem['trivia_personagem']; ?></textarea>
            </div>

            <br><br>

            <h3> Como seu personagem é? </h3>
            <input type="file" name="imagem_personagem" accept="image/*" class="input-imagem">

            <br><br><br>
            <input type="submit" value="Salvar">
        </form>
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