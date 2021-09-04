function abrirCadastro() {
    document.getElementById("cadastroContainer").style.display = "flex"
}

function fecharCadastro() {
    document.getElementById("cadastroContainer").style.display = "none"
}

document.getElementById("buttonCriarConta").addEventListener("click", abrirCadastro)
document.getElementById("buttonCancelarCadastro").addEventListener("click", fecharCadastro)