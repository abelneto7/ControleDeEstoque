<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nome' => 'required',
            'usuario' => 'required|email|unique:users,email',
            'senha' => 'required|min:4|max:50'
        ];
    }

    public function messages()
    {
        return [
            'required' => 'O campo :attribute é obrigatório!',
            'usuario.email' => 'O campo usuario deve ser um e-mail válido!',
            'usuario.unique' => 'O e-mail informado já está em uso!',
            'senha.min' => 'A senha deve ter no mínimo 4 caracteres',
            'senha.max' => 'A senha deve ter no máximo 50 caracteres'
        ];
    }
}
