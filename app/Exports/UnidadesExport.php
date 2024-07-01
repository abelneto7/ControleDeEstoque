<?php

namespace App\Exports;

use App\Unidade;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class UnidadesExport implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Unidade::all();
    }

    public function headings(): array //declarando o tipo de retorno
    {
        return [
            'ID da unidade',
            'Unidade',
            'Descricao',
        ];
    }

    public function map($linha): array
    {

        return [
            $linha->id,
            $linha->unidade,
            $linha->descricao,
        ];
    }
}
