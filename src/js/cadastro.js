const form = document.forms.cadastro

IMask(form.usuario_cpf, {mask: "000.000.000-00"})

document.forms.cadastro.reset() // Reseta o formulário

document.forms.cadastro.addEventListener("submit", async function(e){
    e.preventDefault()

    try{
        fetchJson("?url=Cadastro/cadastrar", new FormData(this))

        alterarPagina()
    }
    catch(rej){
        mensagemError(rej)
    }
})