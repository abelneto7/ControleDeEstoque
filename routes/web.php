<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\LogAcessoMiddleware;
use App\Http\Controllers\AppRoutesController;

Route::middleware('log.acesso')->get('/', 'PrincipalController@principal')
    ->name('site.index');

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

        Route::resource('movimentacao', 'MovimentacaoController');

        Route::get('/export-users', 'ExportController@exportacao');
        Route::get('/export-produtos', 'ExportController@exportacao_produtos')->name('produto.export');
        Route::get('/export-clientes', 'ExportController@exportacao_clientes')->name('cliente.export');
        Route::get('/export-fornecedores', 'ExportController@exportacao_fornecedores')->name('fornecedor.export');
        Route::get('/export-movimentacoes', 'ExportController@exportacao_movimentacoes')->name('movimentacao.export');
        Route::get('/export-pedidos', 'ExportController@exportacao_pedidos')->name('pedido.export');
        Route::get('/export-unidades', 'ExportController@exportacao_unidades')->name('unidade.export');

        Route::get('/exportPDF-users', 'ExportPDFController@exportacao');
        Route::get('/exportPDF-produtos', 'ExportPDFController@exportacao_produtos')->name('produto.exportPDF');
        Route::get('/exportPDF-clientes', 'ExportPDFController@exportacao_clientes')->name('cliente.exportPDF');
        Route::get('/exportPDF-fornecedores', 'ExportPDFController@exportacao_fornecedores')->name('fornecedor.exportPDF');
        Route::get('/exportPDF-movimentacoes', 'ExportPDFController@exportacao_movimentacoes')->name('movimentacao.exportPDF');
        Route::get('/exportPDF-pedidos', 'ExportPDFController@exportacao_pedidos')->name('pedido.exportPDF');
        Route::get('/exportPDF-unidades', 'ExportPDFController@exportacao_unidades')->name('unidade.exportPDF');
    });

Route::get('/contato', 'ContatoController@contato')
    ->name('site.contato');
Route::post('/contato', 'ContatoController@salvar')
    ->name('site.contato');

Route::get('/register', 'RegisterController@index')->name('site.register');
Route::post('/register', 'RegisterController@salvar')->name('site.register');

Route::get('/login/{erro?}', 'LoginController@index')->name('site.login');
Route::post('/login', 'LoginController@autenticar')->name('site.login');

