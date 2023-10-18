function AbreHomepage(){
    window.location.href = "index.html";
}

function AbreRecuperarSenha(){
    window.location.href = "recuperarSenha.html"
}

function AbreCadastro(){
    window.location.href = "cadastro.php";
}

function validarForm() {
    const emailInput = document.getElementById("email_cliente");
    const senhaInput = document.getElementById("senha_cliente");

    if (emailInput.value === "" ) {
        alert("Insira seu email");
    } else if(senhaInput.value === ""){
        alert("Insira sua senha");
    } 
    else {
        document.forms[0].submit();
    }
}
