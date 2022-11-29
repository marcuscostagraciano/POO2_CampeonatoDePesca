window.addEventListener("load", () =>
    fetchJson("?pg=Login&acao=existe")
    .then(res => {
        document.querySelector("#miniatura-usuario").innerHTML = (
            res.esta_logado
            ? `<nome-usuario>${res.usuario}</nome-usuario>`
            : "<a href='?pg=Login'>Log in</a>"
        )
    })
    .catch(rej => mensagemError(rej))
)

// document.querySelector("#deslogar").addEventListener("click", async function(e){
//     e.preventDefault()

//     try{
//         const deslogar = await fetchJson("?pg=Login&acao=deslogar")
//         location.reload()
//     }
//     catch(rej){
//         mensagemError(rej)
//     }
// })

function botaoDeslogar(){
    fetchJson("?pg=Login&acao=deslogar")
}

// Realiza um fetch, lança os erros recebidos e revolve o json no final
async function fetchJson(url, formData = new FormData, debug = false){
    const res = await fetch(url, {
        method: "POST",
        body: formData
    })

    if(!res.ok) throw new Error(`HTTP ERROR: ${res.status}`)

    const json = await res.json()

    if(debug) console.dir(json)
    if(!json.ok) throw new Error(json.error)
    
    return json.retorno
}

// Trata os erros recebidos
function mensagemError(rej){
    alert(rej)
    console.error(rej)
}