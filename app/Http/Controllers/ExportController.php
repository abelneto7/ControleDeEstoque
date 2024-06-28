<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\UsersExport;
use App\Exports\ProdutosExport;
use App\Exports\ClientesExport;
use App\Exports\FornecedoresExport;
use App\Exports\MovimentacoesExport;
use App\Exports\PedidosExport;
use App\Exports\UnidadesExport;
use Maatwebsite\Excel\Facades\Excel;

class ExportController extends Controller
{
    public function exportacao()
    {
        return Excel::download(new UsersExport, 'user.xlsx');
    }

    public function exportacao_produtos()
    {
        return Excel::download(new ProdutosExport, 'produtos.xlsx');
    }

    public function exportacao_clientes()
    {
        return Excel::download(new ClientesExport, 'clientes.xlsx');
    }

    public function exportacao_fornecedores()
    {
        return Excel::download(new FornecedoresExport, 'fornecedores.xlsx');
    }

    public function exportacao_movimentacoes()
    {
        return Excel::download(new MovimentacoesExport, 'movimentacoes.xlsx');
    }

    public function exportacao_pedidos()
    {
        return Excel::download(new PedidosExport, 'pedidos.xlsx');
    }

    public function exportacao_unidades()
    {
        return Excel::download(new UnidadesExport, 'unidades.xlsx');
    }
}
