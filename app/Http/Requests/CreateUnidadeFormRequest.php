<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateUnidadeFormRequest extends FormRequest
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
            'unidade' => 'required|min:1|max:4',
            'descricao' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'required' => 'O campo :attribute deve ser preenchido',
            'unidade.min' => 'O campo unidade deve ter no mínimo 1 caracteres',
            'unidade.max' => 'O campo unidade deve ter no máximo 4 caracteres'
        ];
    }
}
