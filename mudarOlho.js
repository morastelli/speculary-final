function mudarOlho() {
    var imagem = document.getElementById("olho");
    var senha = document.getElementById("senha");
    
    if (imagem.src.endsWith("imagensCadastro/olhoFechado.png")) {
        imagem.src = "imagensCadastro/olhoAberto.png";
        senha.type = "text";
    } else {
        imagem.src = "imagensCadastro/olhoFechado.png";
        senha.type = "password";
    }
}

