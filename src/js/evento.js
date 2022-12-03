window.addEventListener("load", async function(e){
    fetchJson("?pg=Evento&acao=puxarCampeonatos")
    .then(eventos => eventos.map(evento => {
        console.dir(evento)
        
        return `
            <caixa-evento>
                <h4>${evento.nome_campeonato}</h4>
                <div style="width: 170px; height: 70px; border: 1px solid black; line-height: 60px; text-align: center;">imagem exemplo</div>
                
            </caixa-evento>
        `
    }).join(""))
    .then(caixas_evento => {this.document.querySelector("main-container").innerHTML = caixas_evento})
    .catch(rej => mensagemError(rej))
})