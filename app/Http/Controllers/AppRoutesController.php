<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

class AppRoutesController extends Controller
{
    public static function register()
    {
        Route::middleware('autenticacao:padrao,visitante')->prefix('/app')
            ->group(function() {
                Route::get('/home', 'HomeController@index')->name('app.home');
                Route::get('/sair', 'LoginController@sair')->name('app.sair');

                Route::get('/fornecedor', 'FornecedorController@index')->name('app.fornecedor');
                Route::post('/fornecedor/listar', 'FornecedorController@listar')->name('app.fornecedor.listar');
                Route::get('/fornecedor/listar', 'FornecedorController@listar')->name('app.fornecedor.listar');
                Route::get('/fornecedor/adicionar', 'FornecedorController@adicionar')->name('app.fornecedor.adicionar');
                Route::post('/fornecedor/adicionar', 'FornecedorController@adicionar')->name('app.fornecedor.adicionar');
                Route::get('/fornecedor/editar/{id}/{msg?}', 'FornecedorController@editar')->name('app.fornecedor.editar');
                Route::get('/fornecedor/excluir/{id}', 'FornecedorController@excluir')->name('app.fornecedor.excluir');

                //produtos
                Route::resource('produto', 'ProdutoController');

                //Produtos detalhes
                Route::resource('produto-detalhe', 'ProdutoDetalheController');

                Route::resource('cliente', 'ClienteController');
                Route::resource('pedido', 'PedidoController');

                Route::get('pedido-produto/create/{pedido}', 'PedidoProdutoController@create')->name('pedido-produto.create');
                Route::post('pedido-produto/store/{pedido}', 'PedidoProdutoController@store')->name('pedido-produto.store');

                Route::delete('pedido-produto.destroy/{pedidoProduto}/{pedido_id}', 'PedidoProdutoController@destroy')->name('pedido-produto.destroy');

                Route::resource('unidade', 'UnidadeController');

            });
    }
}
