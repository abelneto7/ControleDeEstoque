<?php

namespace App\Exports;

use App\Pedido;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class PedidosExport implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Pedido::all();
    }

    public function headings(): array //declarando o tipo de retorno
    {
        return [
            'ID do pedido',
            'ID do cliente',
        ];
    }

    public function map($linha): array
    {

        return [
            $linha->id,
            $linha->cliente_id
        ];
    }
}
