window.addEventListener("load", async function(e){
    fetchJson("?pg=Evento&acao=puxarCampeonatos")
    .then(eventos => {
        console.dir(eventos)
    })
    .catch(rej => mensagemError(rej))
})