fetchJson("Login/existe")
.then(res => {
    document.querySelector("#miniatura-usuario").innerHTML = (
        res.esta_logado
        ? `<nome-usuario>${res.usuario}</nome-usuario>`
        : "<a href='Login'>Log in</a>"
    )
})
.catch(rej => mensagemError(rej))

// Realiza um fetch, lança os erros recebidos e revolve o json no final
async function fetchJson(url, formData = new FormData, debug = false){
    const res = await fetch(url, {
        method: "POST",
        body: formData
    })

    if(!res.ok) throw new Error(`HTTP ERROR: ${res.status}`)

    if(debug) console.dir(res)
    return res.json()
}

// Trata os erros recebidos
function mensagemError(rej){
    alert(rej)
    console.error(rej)
    console.trace(rej)
}