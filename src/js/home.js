document.querySelector("#deslogar").addEventListener("click", async function(e){
    e.preventDefault()

    try{
        const deslogar = await fetchJson("Login/deslogar")
    }
    catch(rej){
        mensagemError(rej)
    }
})