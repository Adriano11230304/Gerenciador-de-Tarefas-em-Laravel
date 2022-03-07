@include('layout.header')

    <div class="container">
        <h2>Faça o seu login</h2>
        <form class="px-4 py-3 col-4 mb-4" action="{{ url('users/signin') }}" method="post">
            @csrf
                <div class="form-group">
                    <label>Email</label>
                    <input
                        type="text"
                        class="form-control"
                        required
                        oninvalid="this.setCustomValidity('Email obrigatório!')"
                        oninput="setCustomValidity('')"
                        name="email"
                        placeholder="jose@gmail.com">
                </div>
                <div class="form-group">
                    <label>Senha</label>
                    <input
                        type="password"
                        required
                        oninvalid="this.setCustomValidity('Senha obrigatória!')"
                        oninput="setCustomValidity('')"
                        class="form-control"
                        name="password"
                        placeholder="Password"/>
                </div>
                <button type="submit" class="btn btn-outline-primary">Sign in</button>
        </form>
        <a class="dropdown-item" href="/users/signup">Não possui um usuário? Cadastra-se </a>
        <a class="dropdown-item" href="#">Esqueceu sua senha?</a>
    </div>
@include('layout.footer')
