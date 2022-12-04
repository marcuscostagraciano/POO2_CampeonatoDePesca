window.addEventListener("load", async function(e){
    fetchJson("?pg=Evento&acao=puxarCampeonatos")
    .then(eventos => eventos.rows.map(evento => {
        console.dir(evento)

        const data = evento.data.split("-").reverse().join("/")
        
        return `
            <caixa-evento>
                <h4>${evento.nome_campeonato}</h4>
                
                <div style="width: 170px; height: 70px; border: 1px solid black; line-height: 60px; text-align: center;">imagem exemplo</div>
                <div style="margin: 5px;">
                    Data: ${evento.data.split("-").reverse().join("/")}
                </div>
            </caixa-evento>
        `
    }).join(""))
    .then(caixas_evento => {this.document.querySelector("main-container").innerHTML = caixas_evento})
    .catch(rej => mensagemError(rej))
})