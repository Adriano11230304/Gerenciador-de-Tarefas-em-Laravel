@include('layout.headerLogado')

    <div class="container">
        <div class="jumbotron text-center">
            <h1>TODO - Sua lista de Tarefas</h1>
            <p>Bem vindo ao seu gerenciador de tarefas!</p>
        </div>
        <h3>{{ $msg ?? ''}}</h3>
    </div>

    <div>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="btn btn-outline-danger" href="/users/logout">Logout</a>
                </li>
            </ul>

        </div>

</body>
</html>
