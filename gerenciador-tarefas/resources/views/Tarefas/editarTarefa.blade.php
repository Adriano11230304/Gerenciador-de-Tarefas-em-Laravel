@include('layout.headerLogado')

<div class="container">
    <h2>Insira os dados da nova tarefa</h2>
        <form class="px-4 py-3 col-30" action="{{ url('tarefas/editarTarefaPost/'.$tarefa->id) }}" method="post">
            @csrf
                <div class="form-group">
                    <label>Título</label>
                    <input
                        type="text"
                        class="form-control"
                        title='Campo obrigatório'
                        name="titulo"
                        value="{{ $tarefa->titulo }}"
                        placeholder="Insira o título da tarefa"
                        required
                        oninvalid="this.setCustomValidity('Título obrigatório!')"
                        oninput="setCustomValidity('')"/>
                </div>
                <div class="form-group">
                    <label>Motivação</label>
                    <textarea
                        type="text"
                        class="form-control"
                        title='Campo obrigatório'
                        name="motivacao"
                        placeholder="Insira a motivação da tarefa"
                        required
                        oninvalid="this.setCustomValidity('Motivação obrigatória!')"
                        oninput="setCustomValidity('')"
                        rows='10'>{{ $tarefa->motivacao }}</textarea>
                </div>
                <div class="form-group">
                    <label>Detalhamento</label>
                    <textarea
                        type="text"
                        class="form-control"
                        title='Campo obrigatório'
                        name="detalhamento"
                        placeholder="Insira o detalhamento da tarefa"
                        required
                        oninvalid="this.setCustomValidity('Detalhamento obrigatório!')"
                        oninput="setCustomValidity('')"
                        rows='10'>{{ $tarefa->detalhamento }}</textarea>
                </div>
                <div class="form-group">
                    <label>Previsão de Entrega</label>
                    <input
                        type="datetime-local"
                        class="form-control"
                        value="{{ $tarefa->previsaoEntrega }}"
                        name="previsaoEntrega"
                        requiredoninvalid="this.setCustomValidity('Previsão de Entrega obrigatória!')"
                        oninput="setCustomValidity('')"/>
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <label class="input-group-text" for="inputGroupSelect01">Status</label>
                    </div>
                    <select class="custom-select" id="inputGroupSelect01" name='status'>
                      <option selected="Não iniciada">Não iniciada</option>
                      <option value="Em andamento">Em andamento</option>
                      <option value="Concluída">Concluída</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-outline-primary">Alterar Tarefa</button>
        </form>
</div>

</body>
</html>
