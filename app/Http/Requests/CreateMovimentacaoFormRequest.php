<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateMovimentacaoFormRequest extends FormRequest
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
            'produto_id' => 'required|exists:produtos,id',
            'quantidade' => 'required|integer',
            'tipo_movimentacao' => 'required|in:1,2'
        ];
    }

    public function messages()
    {
        return [
            'required' => 'O campo :attribute deve ser preenchido.',
            'produto_id.exists' => 'Produto inexistente.',
            'quantidade.integer' => 'O campo quantidade deve ser um número inteiro.',
            'tipo_movimentacao.in' => 'Tipo de movimentação inválido. Escolha 1 para entrada ou 2 para saída.',
        ];
    }
}
