<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateProdutoDetalheFormRequest;
use App\Produto;
use App\ProdutoDetalhe;
use App\Unidade;
use App\ItemDetalhe;
use Illuminate\Http\Request;

class ProdutoDetalheController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $unidades = Unidade::all();
        $produtos = Produto::all(); // Obtenha todos os produtos

        return view('app.produto_detalhe.create', ['unidades' => $unidades, 'produtos' => $produtos]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        ProdutoDetalhe::create($request->validated());

        return redirect()->route('produto.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Interteger $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $produtoDetalhe = ItemDetalhe::with(['item'])->find($id);
        $unidades = Unidade::all();
        $produtos = Produto::all();

        return view('app.produto_detalhe.edit', ['produto_detalhe' => $produtoDetalhe, 'unidades' => $unidades, 'produtos' => $produtos]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  App\ProdutoDetalhe $produtoDetalhe
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProdutoDetalheFormRequest $request, ProdutoDetalhe $produtoDetalhe)
    {
        $produtoDetalhe->update($request->validated());

        echo 'Atualização realizada com sucesso!';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
