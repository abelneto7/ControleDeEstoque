<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function index()
    {
        return view('site.register', ['titulo' => 'Cadastro']);
    }
    public function salvar(Request $request)
    {
        // Regras de validação
        $regras = [
            'nome' => 'required',
            'usuario' => 'required|email|unique:users,email',
            'senha' => 'required|min:4|max:50'
        ];

        // Mensagens de feedback
        $feedback = [
            'required' => 'O campo :attribute é obrigatório!',
            'usuario.email' => 'O campo usuario deve ser um e-mail válido!',
            'usuario.unique' => 'O e-mail informado já está em uso!',
            'senha.min' => 'A senha deve ter no mínimo 4 caracteres',
            'senha.max' => 'A senha deve ter no máximo 50 caracteres'
        ];

        // Validação
        $request->validate($regras, $feedback);

        // Criar um novo usuário
        $user = new User();
        $user->name = $request->input('nome');
        $user->email = $request->input('usuario');
        $user->password = Hash::make($request->input('senha'));
        $user->save();

        // Redirecionar com mensagem de sucesso
        return redirect()->route('site.login')->with('success', 'Usuário cadastrado com sucesso!');
    }
}
