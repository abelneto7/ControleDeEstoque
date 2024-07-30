<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateFornecedorFormRequest extends FormRequest
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
        $fornecedorId = $this->route('id'); // obter o id do fornecedor da rota

        return [
            'nome' => 'required|min:3|max:40',
            'site' => 'required|url',
            'uf' => 'required|min:2|max:3',
            'email' => 'required|email|unique:fornecedores,email,' . $fornecedorId
        ];
    }

    public function messages()
    {
        return [
            'required' => 'O campo :attribute deve ser preenchido',
            'nome.min' => 'O campo nome deve ter no mínimo 3 caracteres',
            'nome.max' => 'O campo nome deve ter no máximo 40 caracteres',
            'uf.min' => 'O campo uf deve ter no mínimo 2 caracteres',
            'uf.max' => 'O campo uf deve ter no máximo 3 caracteres',
            'email.email' => 'O campo email não foi preenchido corretamente',
            'email.unique' => 'O email informado já está cadastrado',
            'site.url' => 'O campo site deve ser uma URL válida'
        ];
    }
}
