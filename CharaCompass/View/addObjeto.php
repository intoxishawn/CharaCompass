<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- include libraries(jQuery, bootstrap) -->
   <script type="text/javascript" src="//code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" />
    <script type="text/javascript" src="cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

    <link href="summernote-bs5.css" rel="stylesheet">
    <script src="summernote-bs5.js"></script>
    <script src="adicao.js"></script>
    <title> Painel do Objeto</title>
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
        <form>
            <label> Nome do Objeto: </label>
            <br>
            <input type="text">
            <br><br>

            <label> Nome alternativo do Objeto: </label>
            <br>
            <input type="text">
            <br><br>

            <label> Tipo do Objeto: </label>
            <!-- Dropdown menu-->
            <br><br>

            <label> Material(ais) do Objeto: </label>
            <br>
            <input type="text">
            <br><br>

            <label> Propriedades do Objeto: </label>
            <br>
            <input type="text">
            <br><br>

            <label> Status do Objeto: </label>
            <br>
            <input type="text">
            <br><br>
            
            <label> Informações do Objeto: </label>
            <br>
            <textarea id="summernote" name="editordata"></textarea>
            <br><br>

            <label> Simbolismos do Objeto: </label>
            <br>
            <textarea id="summernote" name="editordata"></textarea>
            <br><br>
            
            <label> Origem do Objeto: </label>
            <br>
            <textarea id="summernote" name="editordata"></textarea>
            <br><br>

            <label> Aplicabilidade do Objeto: </label>
            <br>
            <textarea id="summernote" name="editordata"></textarea>
            <br><br>

            <label> Passado do Objeto: </label>
            <br>
            <textarea id="summernote" name="editordata"></textarea>
            <br><br>

            <input type="submit" value="Criar ficha!">

        </form>
    </div>

    <footer>
        <h3> CharaCompass - 2023 </h3>
        <p> A bússola do seu mundo para seus personagens </p>
    </footer>
</body>
</html>