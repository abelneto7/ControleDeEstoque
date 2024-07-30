<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PedidoProdutoFormRequest extends FormRequest
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
            'produto_id' => 'exists:produtos,id',
            'quantidade' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'produto_id.exists' => 'O produto informado não existe',
            'required' => 'O campo :attribute é obrigatório.'
        ];
    }
}
