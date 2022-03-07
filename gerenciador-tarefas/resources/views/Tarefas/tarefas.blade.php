@include('layout.headerLogado')
    <br/>

    <div class="container">
        <table class="table table-borderless table-hover mt-3">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th style='width: 300px' scope="col">Título</th>
                    <th scope="col">Criação</th>
                    <th scope="col">Criador</th>
                    <th scope="col">Prazo</th>
                    <th scope='col'>Status</th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tarefas as $tarefa)
                    <tr>
                        <td>{{ $tarefa['id'] }}</td>
                        <td>{{ $tarefa['titulo'] }}</td>
                        <td>{{ $tarefa['created_at'] }}</td>
                        @foreach($usuarios as $usuario)
                            @if($tarefa['usuarioId'] == $usuario['id'])
                                <td>{{ $usuario['nome'] }}</td>
                            @endif
                        @endforeach
                        <td>{{ $tarefa['previsaoEntrega'] }}</td>
                        <td><a class="btn btn-outline-primary" href="#">{{ $tarefa['status'] }}</a></td>
                        <td><a class="btn btn-outline-primary" id='enviar' href="tarefas/{{ $tarefa['id'] }}" >Abrir Tarefa</a></td>
                        <td><a class="btn btn-outline-primary" href="/tarefas/editar/{{ $tarefa['id'] }}">Editar</a></td>
                        <td><a class="btn btn-outline-danger" href="/tarefas/excluir/{{ $tarefa['id'] }}">Excluir</a></td>
                    </tr>
                @endforeach

            </tbody>
        </table>
        <h3>{{ session('msg') ?? ''}}</h3>
    </div>
    <div>
        <a class="btn btn-outline-primary" href="/tarefas/inserir">Criar uma nova tarefa</a>
        <br/>
        <br/>
        <a class="btn btn-outline-danger" href="/users/logout">Logout</a>
    </div>
</body>
</html>
