<?php

namespace App\Exports;

use App\Movimentacao;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class MovimentacoesExport implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Movimentacao::all();
    }

    public function headings(): array //declarando o tipo de retorno
    {
        return [
            'ID da movimentação',
            'Produto_id',
            'Quantidade',
            'Tipo da movimentação',
        ];
    }

    public function map($linha): array
    {

        return [
            $linha->id,
            $linha->produto_id,
            $linha->quantidade,
            $linha->tipo_movimentacao,
        ];
    }
}
