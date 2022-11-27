// Realiza um fetch, lança os erros recebidos e revolve o json no final
async function fetchJson(url, body, debug = false){
    const res = await fetch(url, body)

    if(!res.ok) throw new Error(`HTTP ERROR: ${res.status}`)

    if(debug) console.dir(res)
    return res.json()
}

// Trata os erros recebidos
function mensagemError(rej){
    alert(rej)
    console.error(rej)
}