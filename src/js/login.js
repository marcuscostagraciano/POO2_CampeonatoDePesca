document.forms.login.addEventListener("submit", async function(e){
    e.preventDefault();
    
    try{
        const logar = await fetchJson("?pg=Login&acao=logar", new FormData(this), true)

        location.reload()
    }
    catch(rej){
        mensagemError(rej)
    }
})