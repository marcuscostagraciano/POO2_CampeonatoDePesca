document.forms.login.addEventListener("submit", async function(e){
    e.preventDefault();
    
    try{
        const logar = await fetchJson("?pg=Login&acao=logar", new FormData(this), true)

        if(!logar) {
            document.querySelector("mensagem-erro").style.display = "inline"
            return false
        }

        location.reload()
    }
    catch(rej){
        mensagemError(rej)
    }
})