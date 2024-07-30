<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProdutoDetalheFormRequest extends FormRequest
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
            'produto_id' => 'unique:produto_detalhes|exists:produtos,id',
            'comprimento' => 'required|numeric',
            'largura' => 'required|numeric',
            'altura' => 'required|numeric',
            'unidade_id' => 'exists:unidades,id'
        ];
    }

    public function messages()
    {
        return [
            'required' => 'O campo :attribute deve ser preenchido',
            'comprimento.numeric' => 'O campo comprimento deve ser um número',
            'altura.numeric' => 'O campo altura deve ser um número',
            'largura.numeric' => 'O campo largura deve ser um número',
            'produto_id.exists' => 'O produto informado não existe',
            'produto_id.unique' => 'Já existe detalhes cadastrados a esse produto.',
            'unidade_id.exists' => 'A unidade de medida informada não existe'
        ];
    }
}
