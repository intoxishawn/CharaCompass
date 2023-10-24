

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
    <title> Painel do Mundo </title>
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
        <form>
            <label> Nome do Mundo: </label>
            <br>
            <input type="text">
            <br><br>

            <label> Informações do Mundo: </label>
            <textarea id="summernote" name="editordata"></textarea>
            <br><br>

            <label> Trivias do Mundo: </label>
            <br>
            <input type="text">
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