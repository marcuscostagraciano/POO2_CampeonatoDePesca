<login-container>
    <form name="login">
        <h2>Entrar na conta</h2>

        <div>
            <label for="usuario-cpf">CPF</label>
            <input type="text" id="usuario-cpf" name="usuario_cpf" placeholder="___.___.___-__">
        </div>

        <div>
            <label for="usuario-senha">Senha</label>
            <input type="password" id="usuario-senha" name="usuario_senha">
        </div>
        
        <mensagem-erro>Usuário não encontrado</mensagem-erro>

        <div>
            <button type="submit">Entre</button>
            <span>ou <a href="?url=Cadastro">crie uma conta</a></span>
        </div>
    </form>
</login-container>

<script>
    IMask(document.forms.login.usuario_cpf, {mask: "000.000.000-00"})

    document.forms.login.reset()

    document.forms.login.addEventListener("submit", async function(e){
        e.preventDefault();
        
        try{
            const logar = await fetchJson("?url=Login/logar", new FormData(this))

            if(!logar.sucesso) {
                document.querySelector("mensagem-erro").style.display = "inline"
                return false
            }

            alterarPagina()
        }
        catch(rej){
            mensagemError(rej)
        }
    })
</script>