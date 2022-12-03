const form = document.forms.cadastro

IMask(form.usuario_cpf, {mask: "000.000.000-00"})

document.forms.cadastro.reset() // Reseta o formulário

document.forms.cadastro.addEventListener("submit", async function(e){
    e.preventDefault()

    try{
        fetchJson("?pg=Cadastro&acao=cadastrar", new FormData(this))

        const a = document.createElement("a")
        a.href = "?"
        a.click()
    }
    catch(rej){
        mensagemError(rej)
    }
})