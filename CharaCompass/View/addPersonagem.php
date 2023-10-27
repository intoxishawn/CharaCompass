<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tiny.cloud/1/al9qkfo7jx764azaiaav5nhrkxepq3vbm0av6fkgsk78r931/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

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
            
            <label> Alinhamento do personagem: </label>
            <br>
            <input type="text">
            <br><br>
            
            <label> Personalidade do personagem: </label>
            <br>
            <textarea>
                Welcome to TinyMCE!
            </textarea>
            <br><br>

            <label> Pontos fortes do personagem: </label>
            <br>
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
            <textarea></textarea>
            <br><br>

            <label> Passado do personagem: </label>
            <br>
            <textarea></textarea>
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
            <textarea></textarea>
            <br><br>

            <label> Como seu personagem soaria? Nos deixe ouvir! </label>
            <br>
            <input type="file" accept = ".mp3">
            <br><br>

            <label> Como seu personagem seria? Nos deixe ver! </label>
            <br>
            <input type="file" accept = ".png, .jpeg, .jpg">
            <br><br><br>
            <input type="submit" value="Criar ficha!">
        </form>
    </div>

    <footer>
        <h3> CharaCompass - 2023 </h3>
        <p> A bússola do seu mundo para seus personagens </p>
    </footer>

    //chama o summernote
    <script>
  tinymce.init({
    selector: 'textarea',   
    tinycomments_mode: 'embedded',
    tinycomments_author: 'Author name',
    mergetags_list: [
      { value: 'First.Name', title: 'First Name' },
      { value: 'Email', title: 'Email' },
    ],
    ai_request: (request, respondWith) => respondWith.string(() => Promise.reject("See docs to implement AI Assistant")),
  });
</script>
</body>
</html>