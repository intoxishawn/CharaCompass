function AbreHomepage(){
    window.location.href = "index.html";
}

function AbreCadastro(){
    window.location.href = "cadastro.php";
}

function mostrarSenha() {
    var var1 = document.getElementById("senha_cliente");
    if (var1.type === "password") {
      var1.type = "text";
    } else {
      var1.type = "password";
    }
  } 