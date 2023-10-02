function AbreHomepage(){
    window.location.href = "index.html";
}

function AbreRecuperarSenha(){
    window.location.href = "recuperarSenha.html"
}

function AbreCadastro(){
    window.location.href = "cadastro.php";
}

function AbreInicial(){
    window.location.href = "inicialUsuario.html";
}

function SubstituirCaracteres(){
    var senhaInput = document.getElementById("senha_cliente");
    var valor = senhaInput.value;
    var ocultar = "";

    for(var i = 0; i < valor.length ; i++){
        ocultar += "☕";
    }

    senhaInput.value = ocultar;
}
