<main-container>
    <h2>Cadastro de usuário</h2>

    <form name="cadastro">
        <grid-input>
            <div>
                <label for="usuario-cpf">CPF</label>
                <input type="text" id="usuario-cpf" name="usuario_cpf" placeholder="___.___.___-__">
            </div>

            <div>
                <label for="usuario-nome">Nome</label>
                <input type="text" id="usuario-nome" name="usuario_nome">
            </div>

            <div>
                <label for="usuario-sobrenome">Sobrenome</label>
                <input type="text" id="usuario-sobrenome" name="usuario_sobrenome">
            </div>
            
            <div>
                <label for="usuario-senha">Senha</label>
                <input type="password" id="usuario-senha" name="usuario_senha">
            </div>
            
            <div>
                <label for="usuario-email">E-mail</label>
                <input type="email" class="input-email" id="usuario-email" name="usuario_email">
            </div>
        </grid-input>

        <div>
            <button type="submit">Cadastrar</button>
        </div>
    </form>
</main-container>

<script>
    const form = document.forms.cadastro

    IMask(form.usuario_cpf, {mask: "000.000.000-00"})

    document.forms.cadastro.reset() // Reseta o formulário

    document.forms.cadastro.addEventListener("submit", async function(e){
        e.preventDefault()

        try{
            fetchJson("?url=Cadastro/cadastrar", new FormData(this))

            alterarPagina()
        }
        catch(rej){
            mensagemError(rej)
        }
    })
</script>