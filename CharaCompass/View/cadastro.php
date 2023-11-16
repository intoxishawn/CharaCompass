<?php
session_start();

if (isset($_SESSION['msg'])) {
    echo '<script>alert("' . $_SESSION['msg'] . '");</script>';
    unset($_SESSION['msg']);
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="cadastroCodes.js"></script>
    <link href="../View/CSS/login_cadastro.css" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="../View/Imagens/favicon-32x32.png">
    <title> Criar Conta </title>
</head>
<body>
    <header>
        <h1> CharaCompass</h1>
        <h2> Criar Conta </h2>
    </header>

    <nav>
        <button onclick="AbreHome()" class="nav_button"> Voltar </button>
        <button onclick="AbreLogin()" class="nav_button"> Login </button>
    </nav>

    <div id="main">
    <section class="pt-5 pb-5 mt-0 align-items-center d-flex bg-dark" style="min-height: 100vh; background-size: cover; background-image: href = CharaCompass\View\Imagens\nick-morrison-FHnnjk1Yj7Y-unsplash.jpg;">
        <div class="container-fluid">
          <div class="row  justify-content-center align-items-center d-flex-row text-center h-100">
            <div class="col-12 col-md-4 col-lg-3   h-50 ">
              <div class="card shadow">
                <div class="card-body mx-auto">
                  <h4 class="card-title mt-3 text-center">Crie sua conta</h4>
                  <p class="text-center">Cria sua conta gratuita agora mesmo!</p>
                  <form>
                    <div class="form-group input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                      </div>
                      <input name="new_username" class="form-control" placeholder="Nome de usuário" type="text">
                    </div>
                    <div class="form-group input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
                      </div>
                      <input name="new_email" class="form-control" placeholder="Email address" type="email">
                    </div>
                    <div class="form-group input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                      </div>
                      <input class="form-control" placeholder="Create password" type="password">
                    </div>
                    <div class="form-group input-group">
                      </div>
                    </div>
                    <div class="form-group">
                      <button type="submit" class="btn btn-primary btn-block"> Create Account </button>
                    </div>
                    <p class="text-center">Have an account?
                      <a href="">Log In</a>
                    </p>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
     </section>

    </div>
    <footer>
        <h3> CharaCompass - 2023 </h3>
        <p> A bussola do seu mundo para seus personagens </p>
    </footer>
</body>
</html>