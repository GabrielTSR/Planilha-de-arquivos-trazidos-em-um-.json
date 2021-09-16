function abrirCadastro() {
    document.getElementById("cadastroContainer").style.display = "flex"
}

function fecharCadastro() {
    document.getElementById("cadastroContainer").style.display = "none"
}

function openDeletePage() {
    document.getElementById("deleteContainer").style.display = "flex"
}

function closeDeletePage() {
    document.getElementById("deleteContainer").style.display = "none"
}

function openEditModal(idEmployee, firstName, lastName, email, ipAddress, country, department, gender) {

    document.getElementById("idEmployee").value = idEmployee
    document.getElementById("editFirstName").value = firstName
    document.getElementById("editLastName").value = lastName
    document.getElementById("editEmail").value = email
    document.getElementById("editIpAddress").value = ipAddress
    document.getElementById("editCountry").value = country
    document.getElementById("editDepartment").value = department
    document.getElementById("editGender").value = gender

    document.getElementById("editContainer").style.display = "flex"


}

function closeEditModal() {
    document.getElementById("editContainer").style.display = "none"
}

function deletar(idFuncionario) {
    let confirmacao = confirm("deseja mesmo deletar o funcionário?")

    if (confirmacao) {
        window.location.href = "acaoDeletar.php?id=" + idFuncionario
    }
}

document.getElementById("buttonCriarConta").addEventListener("click", abrirCadastro)

document.getElementById("buttonCancelarCadastro").addEventListener("click", fecharCadastro)

// document.getElementById("deleteUser")b.addEventListener("click", openDeletePage)

document.getElementById("dontDelete").addEventListener("click", closeDeletePage)