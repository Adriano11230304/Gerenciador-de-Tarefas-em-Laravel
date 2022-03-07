<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Users;
use Validator;

class UsersController extends Controller{

    public function index(){
        return view('Users.index');
    }
     public function AuthUsers(Request $request){

        $rules = [
            'email' => 'required|email:rfc',
            'password' => 'required|min:5|max:100'
        ];
        $messages = [
            'email' => 'Email informado não está no padrão correto.',
            'password.min' => 'Password possui um mínimo de 5 e máximo de 100 caracteres.',
            'email.required' => 'Informe o email de login.',
            'password.max' => 'Password possui um mínimo de 5 e máximo de 100 caracteres.',
            'password.required' => 'Informe a senha de login.'
        ];
        $validator = Validator::make($request->all(),$rules, $messages);
        if ($validator->fails()){
            return redirect('/')
            ->withErrors($validator)
            ->withInput();
        }

        $result = Users::where('email',$request->input('email'))->where('password',$request->input('password'))->first();
       if (!$result) { // Does it match the user credentials?
            return redirect('/')->with('msg','Incorreto usuário ou senha.');
       } else {
            session(['email'=> $result['email']]);
            session(['id'=>$result['id']]);
            return redirect('/users/signin')->with('msg','Login realizado com sucesso!');
            /*if ($result['name'] == 'admin'){

               return redirect('adminsession')->with(['admin','true']);
            }else{
                return redirect()->route('customersession', ['id' => $result['id']]);

            }*/
       }
    }

    public function Register(){
        return view('Users.register');
    }

    public function RegisterPost(Request $request){
        $rules = [
            'email' => 'required|email:rfc',
            'password' => 'required|min:5|max:100'
        ];
        $messages = [
            'email' => 'Email informado não está no padrão correto.',
            'password.min' => 'Password possui um mínimo de 5 e máximo de 100 caracteres.',
            'email.required' => 'Informe o email de login.',
            'password.max' => 'Password possui um mínimo de 5 e máximo de 100 caracteres.',
            'password.required' => 'Informe a senha de login.'
        ];
        $validator = Validator::make($request->all(),$rules, $messages);
        if ($validator->fails()){
            return redirect('/users/signup')
            ->withErrors($validator)
            ->withInput();
        }

        $model = new Users;
        $model->email = $request->email;
        $model->password = $request->password;
        $model->created_at = now();

        $model->save();

        return redirect('/')->with('msg','Seu usuário foi cadastrado com sucesso!');
    }

    public function listarTarefas(){
        if(session('email')){
            return view('tarefas');
        }else{
            return redirect('/')->with('msg','Você não está logado.');
        }
    }

    public function Home(){
        if(session('email')){
            return view('Users.indexLogado');
        }else{
            return redirect('/')->with('msg','Você não está logado.');
        }
    }

    public function logout(){
        session()->flush();
        return redirect('/') ->with('msg','Você foi deslogado.');
    }

}

?>
