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
            <span>ou <a href="?pg=Cadastro">crie uma conta</a></span>
        </div>
    </form>
</login-container>