document.forms.login.addEventListener("submit", async function(e){
    e.preventDefault();
    
    try{
        const logar = await fetchJson("/Login/logar", new FormData(this))

        location.reload()
    }
    catch(rej){
        mensagemError(rej)
    }
})