<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterFormRequest;
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
    public function salvar(RegisterFormRequest $request)
    {
        $validated = $request->validated();

        // Criar um novo usuário
        $user = new User();
        $user->name = $validated['nome'];
        $user->email = $validated['usuario'];
        $user->password = Hash::make($validated['senha']);
        $user->save();

        // Redirecionar com mensagem de sucesso
        return redirect()->route('site.login')->with('success', 'Usuário cadastrado com sucesso!');
    }
}
