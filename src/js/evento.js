window.addEventListener("load", async function(e){
    fetchJson("?url=Evento/puxarCampeonatos")
    .then(eventos => {
        const caixas_evento = eventos.rows.map(evento => {
            console.dir(evento)
            
            return `
                <caixa-evento>
                    <h4>${evento.nome_campeonato}</h4>
                    
                    <div style="
                        display: grid;
                        grid-template-columns: 170px 1fr;
                    ">
                        <div>
                            <div style="height: 70px; border: 1px solid black; line-height: 60px; text-align: center;">imagem exemplo</div>
                            <div style="margin: 5px; text-align: center;">
                                Data: ${evento.data.split("-").reverse().join("/")}
                            </div>
                        </div>

                        <div id="inscrever-${evento.pk_campeonato}">
                        </div>
                    </div>
                </caixa-evento>
            `
        }).join("")

        return {
            caixas_evento: caixas_evento,
            eventos: eventos
        }
    })
    .then(res => {
        this.document.querySelector("main-container").innerHTML = res.caixas_evento

        res.eventos.rows.map(evento => this.document.querySelector(`#inscrever-${evento.pk_campeonato}`).append(botaoInscrever(evento.pk_campeonato)))
    })
    .catch(rej => mensagemError(rej))
})

function botaoInscrever(id_campeonato){
    const botao = document.createElement("button")
    botao.classList.add("botao-inscrever")

    const formData = new FormData
    formData.append("id_campeonato", id_campeonato)

    // fetchJson("?url=evento/verificarEvento", formData, true)
    // .then(res => {
    //     if(res.esta_cadastrado){
    //         botao.innerText = "Inscrito"
    //         botao.disabled  = true

    //         return false
    //     }
        
        botao.innerText = "Inscrever-se"

        botao.addEventListener("click", async function(e){
            e.preventDefault()
            
            this.disabled = true
    
            try{
                // const formData = new FormData
                // formData.append("id_campeonato", id_campeonato)
    
                // const a = await fetch("?url=Evento/inscreverEvento", {
                //     method: "POST",
                //     body: formData
                // })
    
                // const b = await a.text()
    
                // console.dir(b)
    
                const inscrever = await fetchJson("?url=Evento/inscreverEvento", formData, true)
    
                this.innerText = "Inscrito"
                
            }
            catch(rej){
                mensagemError(rej)
                this.disabled = false
            }
        })
    // })
    // .catch(rej => mensagemError(rej))

    return botao
}