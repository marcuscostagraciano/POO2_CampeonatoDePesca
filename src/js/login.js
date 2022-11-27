document.forms.login.addEventListener("submit", async function(e){
    e.preventDefault();
    
    try{
        const logar = await fetch("/Login/logar", {
            method: "POST",
            body: new FormData(this)
        })

        location.reload()
    }
    catch(rej){
        mensagemError(rej)
    }
})