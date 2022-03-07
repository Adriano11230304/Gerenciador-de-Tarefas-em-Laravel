@include('layout.header')

<div class="container">
    <h2>Faça o seu cadastro</h2>
        <form class="px-4 py-3 col-4 mb-4" action="{{ url('users/signup') }}" method="post">
            @csrf
                <div class="form-group">
                    <label>Email</label>
                    <input
                        type="text"
                        class="form-control"
                        title='Campo obrigatório'
                        name="email"
                        placeholder="jose@gmail.com"
                        required
                        oninvalid="this.setCustomValidity('Email obrigatório!')"
                        oninput="setCustomValidity('')"/>
                </div>
                <div class="form-group">
                    <label>Senha</label>
                    <input
                        type="password"
                        class="form-control"
                        name="password"
                        placeholder="Password"
                        requiredoninvalid="this.setCustomValidity('Senha obrigatória!')"
                        oninput="setCustomValidity('')"/>
                </div>
                <button type="submit" class="btn btn-outline-primary">Register</button>
        </form>
</div>
@include('layout.footer')
