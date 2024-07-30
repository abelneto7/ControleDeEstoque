<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginFormRequest extends FormRequest
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
            'usuario' => 'required|email',
            'senha' => 'required',
            ];
    }

    /**
     * Get the validation messages that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'usuario.required' => 'O campo usuario (e-mail) é obrigatório',
            'usuario.email' => 'O campo usuario deve ser um endereço de email válido!',
            'senha.required' => 'O campó senha é obrigatório'
        ];
    }
}
