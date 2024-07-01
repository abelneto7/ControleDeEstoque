<?php

namespace App\Exports;

use App\Produto;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ProdutosExport implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Produto::all();
    }

    public function headings(): array //declarando o tipo de retorno
    {
        return [
            'ID do produto',
            'Nome do produto',
            'descricao',
            'Fornecedor_id',
            'Peso',
            'Unidade ID',
        ];
    }

    public function map($linha): array
    {

        return [
            $linha->id,
            $linha->nome,
            $linha->descricao,
            $linha->fornecedor_id,
            $linha->peso,
            $linha->unidade_id,
        ];
    }
}
