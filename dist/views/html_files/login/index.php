<login-container>
    <form name="login">
        <h2>Entrar na conta</h2>

        <div>
            <label for="usuario-login">Usuario</label>
            <input type="text" id="usuario-login" name="usuario_login">
        </div>

        <div>
            <label for="usuario-senha">Senha</label>
            <input type="password" id="usuario-senha" name="usuario_senha">
        </div>
        
        <mensagem-erro>Usuário não encontrado</mensagem-erro>

        <div>
            <button type="submit">Entrar</button>
            <span>ou <a href="?pg=Cadastro">crie uma conta</a></span>
        </div>
    </form>
</login-container>