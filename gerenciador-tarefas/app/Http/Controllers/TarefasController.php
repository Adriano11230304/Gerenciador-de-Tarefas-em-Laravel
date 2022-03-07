<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Tarefas;
use App\Models\Users;
use Validator;

class TarefasController extends Controller{
    public function listarTarefas(){
        if(session('email')){
            $data['tarefas'] = Tarefas::all();
            $data['usuarios'] = Users::all();

            return view('Tarefas.tarefas', $data);
        }else{
            $data['msg'] = 'Você não está logado.';
            return view('Users.index', $data);
        }
    }

    public function detalharTarefa($id){
        $data['tarefa'] = Tarefas::where('id', $id)->first();
        $data['usuario'] = Users::where('id', $data['tarefa']->usuarioId)->first();
        return view('Tarefas.detalharTarefa', $data);
    }

    public function inserirTarefa(){
        return view('Tarefas.inserirTarefa');
    }

    public function inserirTarefaPost(Request $request){

        $tarefa = new Tarefas;
        $tarefa->titulo = $request->titulo;
        $tarefa->motivacao = $request->motivacao;
        $tarefa->detalhamento = $request->detalhamento;
        $tarefa->previsaoEntrega = $request->previsaoEntrega;
        $tarefa->usuarioId = session('id');
        $tarefa->created_at = now();
        $tarefa->status = 'Não iniciada';
        $tarefa->save();

        return redirect('/tarefas')->with('msg', 'Tarefa inserida com sucesso.');
    }

    public function excluirTarefa($id){
        $tarefa = Tarefas::where('id', $id)->first();
        $tarefa->delete();

        return redirect('/tarefas')->with('msg', 'Tarefa excluída com sucesso.');
    }

    public function editarTarefa($id){
        $tarefa = Tarefas::where('id', $id)->first();

        return view('Tarefas.editarTarefa', ['tarefa' => $tarefa]);
    }

    public function editarTarefaPost(Request $request, $id){
        dump($id);
        $tarefa = Tarefas::find($id);
        $tarefa->updated_at = now();
        $tarefa->titulo = $request->titulo;
        $tarefa->motivacao = $request->motivacao;
        $tarefa->detalhamento = $request->detalhamento;
        $tarefa->previsaoEntrega = $request->previsaoEntrega;
        $tarefa->status = $request->status;


        if($tarefa->status == 'Concluída'){
            $tarefa->finalizada = now();
        }
        $tarefa->update();

        return redirect('/tarefas')->with('msg', 'Tarefa editada com sucesso.');
        // Tarefas::find($id)->update($request->all());

    }
}

?>
