    IMask(document.forms.login.usuario_cpf, {mask: "000.000.000-00"})

document.forms.login.reset()

document.forms.login.addEventListener("submit", async function(e){
    e.preventDefault();
    
    try{
        const logar = await fetchJson("?url=Login/logar", new FormData(this))

        if(!logar.sucesso) {
            document.querySelector("mensagem-erro").style.display = "inline"
            return false
        }

        alterarPagina()
    }
    catch(rej){
        mensagemError(rej)
    }
})