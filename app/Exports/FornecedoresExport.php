<?php

namespace App\Exports;

use App\Fornecedor;
use Maatwebsite\Excel\Concerns\FromCollection;

class FornecedoresExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Fornecedor::all();
    }
}
