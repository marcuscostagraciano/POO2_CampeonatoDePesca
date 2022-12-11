window.addEventListener("load", () =>
    fetchJson("?url=Login/existe")
    .then(res => {
        document.querySelector("#miniatura-usuario").innerHTML = (
            res.esta_logado
            ? `<nome-usuario><a href="?url=Login/deslogar">${res.usuario}</a></nome-usuario>`
            : "<a href='?url=Login'>Log in</a>"
        )
    })
    .catch(rej => mensagemError(rej))
)

function botaoDeslogar(){
    fetchJson("?url=Login/deslogar")
    
    setTimeout(alterarPagina, 1000)
    // alterarPagina()
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
    
    return json
}

function alterarPagina(pagina = "?url=Home"){
    const a = document.createElement("a")
    a.href = pagina
    a.click()
}

// Trata os erros recebidos
function mensagemError(rej){
    alert(rej)
    console.error(rej)
}