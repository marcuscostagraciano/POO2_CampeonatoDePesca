<!DOCTYPE html>
<html>
<header>
    <meta charset="utf-8" />
    <title>Pescaria</title>

    <script src="https://unpkg.com/imask"></script>

    <style>
        body {
            font-family: Verdana, Geneva, Tahoma, sans-serif;

            background-color: #ffffff;

            padding: 0;
            margin: 0;
        }

        input {
            display: block;

            color: #646464;

            font-size: 1.1em;

            border-top: none;
            border-right: none;
            border-left: none;
            border-bottom: 1px solid black;

            margin: 4px 0;
        }
        input:focus {
            outline: none;
        }

        button[type="submit"] {
            font-size: 1.05em;

            border: 1px solid #2975e7;

            margin: 30px 0;
            padding: 4px 6px;
        }
        button[type="submit"]:hover {
            background-color: #2975e7;
            color: white;

            font-size: 1.05em;

            border: 1px solid #2975e7;

            margin: 30px 0;
            padding: 4px 6px;
        }

        nav {
            background-color: #d4d4d4;

            display: grid;
            grid-template-columns: repeat(auto-fill, 70px);
            grid-column-gap: 30px;

            padding: 0 30% 0 30%;
        }

        main {
            background-color: #ffffff;

            width: 950px;
            height: 100%;

            margin: 0 0 0 30%;
        }

        grid-input {
            display: grid;
            grid-template-columns: repeat(4, 190px);
            grid-column-gap: 30px;
        }

        login-container {
            position: absolute;
            top: 30%;
            left: 40%;

            width: 300px;
            border: 1px solid #83838352;
            border-radius: 10px;

            padding: 20px 50px;
        }
        login-container input {
            width: 100%;
        }

        main-container {
            display: block;
            width: 100%;
            height: 100%;

            border-right: 1px solid #83838352;
            border-left: 1px solid #83838352;
            border-top: none;
            border-bottom: none;

            margin: auto;
            padding: 20px 30px;
        }

        caixa-evento {
            display: block;
            width: 600px;
            height: 170px;

            border: 1px solid black;
            border-radius: 10px;

            padding: 0px 20px;
            margin: 10px 0;
        }

        mensagem-erro {
            display: none;

            color: red;

            font-size: 0.8em;
        }

        button.botao-inscrever {
            font-size: 1.05em;

            border: 1px solid #bb4040;

            margin: 30px;
            padding: 4px 6px;
        }
        button.botao-inscrever:hover {
            background-color: #bb4040;
            color: white;

            font-size: 1.05em;

            border: 1px solid #bb4040;

            margin: 30px;
            padding: 4px 6px;
        }

        .text-right {
            text-align: right;
        }

        .text-center {
            text-align: center;
        }

        .input-email {
            width: 400px;
        }
    </style>

    <script>
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

        // Realiza um fetch, lan??a os erros recebidos e revolve o json no final
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

        function alterarPagina(pagina = "Home"){
            const a = document.createElement("a")
            a.href = pagina
            a.click()
        }

        // Trata os erros recebidos
        function mensagemError(rej){
            alert(rej)
            console.error(rej)
        }
    </script>
</header>
<body>
    <!-- barra de navega????o -->
    <nav>
        <p><a href="?url=Home">Home</a></p>
        <p><a href="?url=Evento">Eventos</a></p>
        <p id="miniatura-usuario" class="text-right"><a href="">Log in</a></p>
    </nav>

<main>