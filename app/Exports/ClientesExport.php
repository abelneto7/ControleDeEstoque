<?php

namespace App\Exports;

use App\Cliente;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ClientesExport implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Cliente::all();
    }

    public function headings(): array //declarando o tipo de retorno
    {
        return [
            'ID do cliente',
            'Nome do cliente',
        ];
    }

    public function map($linha): array
    {
        return [
            $linha->id,
            $linha->nome,
        ];
    }
}
