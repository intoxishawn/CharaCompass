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
    <title> Painel do Personagem</title>
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
        <form>
            <label>Nome do Personagem: </label>
            <br>
            <input type="text" required>
            <br><br>
            
            <label> Idade do personagem: </label>
            <br>
            <input type="text">
            <br><br>
            
            <label> Gênero do personagem: </label>
            <br>
            <input type="radio" value="Masculino" name="gender">
            <label> Masculino </label>
            <br>
            <input type="radio" value="Feminino" name="gender">
            <label> Feminino </label>
            <br>
            <input type="radio" value="Não Binário" name="gender">
            <label> Não Binário </label>
            <br><br>
            
            <label> Pronomes do personagem: </label>
            <br>
            <input type="text">
            <br><br>

            <label> Raça do personagem: </label>
            <br>
            <input type="text">
            <br><br>

            <label> Nacionalidade do personagem: </label>
            <br>
            <input type="text">
            <br><br>

            <label> Profissão do personagem: </label>
            <br>
            <input type="text">
            <br><br>

            <label> Importância do personagem: </label>
            <br>
            <input type="text">
            <br><br>

            <label> Universo do personagem: </label>
            <!-- fazer um dropdown para esse -->
            <br><br>
            
            <label> Alinhamento do personagem: </label>
            <br>
            <input type="text">
            <br><br>

            <label> Personalidade do personagem: </label>
            <br>
            <textarea id="summernote" name="editordata"></textarea>
            <br><br>

            <label> Pontos fortes do personagem: </label>
            <br>
            <input type="text">
            <br><br>

            <label> Pontos fracos do personagem: </label>
            <br>
            <input type="text">
            <br><br>

            <label> Maneirismos do personagem: </label>
            <br>
            <input type="text">
            <br><br>

            <label> Social do personagem: </label>
            <br>
            <input type="text">
            <br><br>

            <label> Mentalidade do personagem: </label>
            <br>
            <textarea id="summernote" name="editordata"></textarea>
            <br><br>

            <label> Passado do personagem: </label>
            <textarea id="summernote" name="editordata"></textarea>
            <br><br>

            <label> Grupo do personagem: </label>
            <br>
            <input type="text">
            <br><br>

            <label> Inimigos do personagem: </label>
            <br>
            <input type="text">
            <br><br>

            <label> Saúde do personagem: </label>
            <br>
            <input type="text">
            <br><br>

            <label> Objetos do personagem: </label>
            <br>
            <input type="text">
            <br><br>

            <label> Trivias do personagem: </label>
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