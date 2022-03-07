@include('layout.headerLogado')

<div class='container'>
    <br/>
    <h2>{{ $tarefa['titulo'] }}</h2>
    <br/><br/>
    <h3>Motivação:</h3>
    <h4 class="border">{{ $tarefa['motivacao'] }}</h4>
    <br/>
    <h3>Detalhamento:</h3>
    <h4 class="border">{{ $tarefa['detalhamento'] }}</h4>
    <div class="container">
        <table class="table table-borderless table-hover mt-3">
            <thead>
                <tr>
                    <th scope="col">Data de Criação</th>
                    <th scope="col">Criador da Tarefa</th>
                    <th scope="col">Prazo de Entrega</th>
                    <th scope='col'>Status</th>
                    <th scope='col'>Data de Finalização</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $tarefa['created_at'] }}</td>
                    <td>{{ $usuario['nome'] }}</td>
                    <td>{{ $tarefa['previsaoEntrega'] }}</td>
                    <td><a class="btn btn-outline-primary" href="#">{{ $tarefa['status'] }}</a></td>
                    <td>{{ $tarefa['finalizada'] }}</td>
                </tr>
            </tbody>
        </table>
        <h3>{{ $msg ?? ''}}</h3>
    </div>
    <br/>
    <div>
        <a class="btn btn-outline-primary" href="/tarefas/editar/{{ $tarefa['id'] }}">Editar Tarefa</a>
        <a class="btn btn-outline-danger" href="/tarefas/excluir/{{ $tarefa['id'] }}">Excluir Tarefa</a>
        <a class="btn btn-outline-primary" href="/tarefas/inserir">Criar uma nova tarefa</a>
        <br/>
        <br/>
    </div>
</div>
<div>
    <a class="btn btn-outline-danger" href="/users/logout">Logout</a>
</div>
<br/>
</body>
</html>
