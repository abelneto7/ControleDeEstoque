<?php

namespace App\Exports;

use App\Movimentacao;
use Maatwebsite\Excel\Concerns\FromCollection;

class MovimentacoesExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Movimentacao::all();
    }
}
