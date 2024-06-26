<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index(Request $request)
    {

        $erro = '';

        if($request->get('erro')==1){
            $erro = 'Usuário e ou senha não existem';
        }

        if ($request->get('erro') == 2){
            $erro = 'Necessário realizar login para ter acesso a página';
        }

        return view ('site.login', ['titulo' => 'login', 'erro' => $erro]);
    }

    public function autenticar(Request $request)
    {
        //regras de validação
        $regras = [
          'usuario' => 'email',
          'senha' => 'required'
        ];

        //as mensagens de freedback de validação
        $freedback = [
          'usuario.email' => 'O campo usuario (e-mail) é obrigatório!',
          'senha.required' => 'O campó senha é obrigatório'
        ];

        //se nao passar pelo validate
        $request->validate($regras, $freedback);

        // Recuperamos os parâmetros do formulário
        $email = $request->get('usuario');
        $password = $request->get('senha');

        // Buscar o usuário no banco de dados
        $usuario = User::where('email', $email)->first();

        if ($usuario && Hash::check($password, $usuario->password)) {
            // Iniciar sessão
            session_start();
            $_SESSION['nome'] = $usuario->name;
            $_SESSION['email'] = $usuario->email;

            return redirect()->route('app.home');
        } else {
            return redirect()->route('site.login', ['erro' => 1]);
        }


        /*Para resolver o problema de autenticação enquanto mantém a lógica de sessão,
        usei Hash::check para verificar a senha criptografada no banco de dados.*/
    }

    public function sair()
    {
        session_destroy();
        return redirect()->route('site.index');
    }
}
