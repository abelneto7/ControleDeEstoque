<?php

namespace App\Http\Controllers;

use App\Cliente;
use App\Fornecedor;
use App\Movimentacao;
use App\Pedido;
use App\Produto;
use App\ProdutoDetalhe;
use App\Unidade;
use App\ItemDetalhe;
use App\Exports\UsersExport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

class ExportPDFController extends Controller
{
    public function exportacao_produtos()
    {
        $ItemDetalhe = ItemDetalhe::all();
        $produto_detalhe = ProdutoDetalhe::all();
        $unidades = Unidade::all();
        $fornecedores = Fornecedor::all();
        $produtos = Produto::all();

        $pdf = PDF::loadView('app.produto.pdf', ['produtos' => $produtos, 'unidades' => $unidades, 'fornecedores', $fornecedores, 'produto_detalhe' => $produto_detalhe, 'ItemDetalhe' => $ItemDetalhe]);

        return $pdf->download('lista_de_podutos.pdf');    }

    public function exportacao_clientes()
    {
        $clientes = Cliente::all();

        $pdf = PDF::loadView('app.cliente.pdf', ['clientes' => $clientes]);

        return $pdf->download('lista_de_clientes.pdf');
    }

    public function exportacao_fornecedores()
    {
        $fornecedores = Fornecedor::all();

        $pdf = PDF::loadView('app.fornecedor.pdf', ['fornecedores' => $fornecedores]);

        return $pdf->download('lista_de_fornecedores.pdf');    }

    public function exportacao_movimentacoes()
    {
        $movimentacoes = Movimentacao::all();
        $produtos = Produto::all();

        $pdf = PDF::loadView('app.movimentacao.pdf', ['movimentacoes' => $movimentacoes, 'produtos' => $produtos]);

        return $pdf->download('lista_de_movimentacoes.pdf');    }

    public function exportacao_pedidos()
    {
        $clientes = Cliente::all();
        $pedidos = Pedido::all();

        $pdf = PDF::loadView('app.pedido.pdf', ['pedidos' => $pedidos, 'clientes' => $clientes]);

        return $pdf->download('lista_de_pedidos.pdf');    }

    public function exportacao_unidades()
    {
        $unidades = Unidade::all();

        $pdf = PDF::loadView('app.unidade.pdf', ['unidades' => $unidades]);

        return $pdf->download('lista_de_unidades.pdf');    }
}
