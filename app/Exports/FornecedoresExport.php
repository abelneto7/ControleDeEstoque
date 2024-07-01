<?php

namespace App\Exports;

use App\Fornecedor;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class FornecedoresExport implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Fornecedor::all();
    }

    public function headings(): array //declarando o tipo de retorno
    {
        return [
            'ID',
            'Nome',
            'Site',
            'Email',
            'UF'
        ];
    }

    public function map($linha): array
    {

        return [
            $linha->id,
            $linha->nome,
            $linha->site,
            $linha->email,
            $linha->uf,
        ];
    }
}
