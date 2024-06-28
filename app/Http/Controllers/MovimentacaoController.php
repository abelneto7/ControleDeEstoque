<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movimentacao;
use App\Produto;

class MovimentacaoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $produtos = Produto::all();

        $movimentacoes = Movimentacao::where('produto_id', 'like', '%'.$request->input('produto_id').'%')
            ->where('quantidade', 'like', '%'.$request->input('quantidade').'%')
            ->where('tipo_movimentacao', 'like', '%'.$request->input('tipo_movimentacao').'%')
            ->paginate(10);

        return view('app.movimentacao.index', ['movimentacoes' => $movimentacoes, 'produtos' => $produtos, 'request' => $request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $produtos = Produto::all();

        return view('app.movimentacao.create', ['produtos' => $produtos]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $produtos = Produto::all();
        $regras = [
            'produto_id' => 'required|exists:produtos,id',
            'quantidade' => 'required|integer',
            'tipo_movimentacao' => 'required|in:1,2'
        ];

        $feedback = [
            'required' => 'O campo :attribute deve ser preenchido.',
            'produto_id.exists' => 'Produto inexistente.',
            'quantidade.integer' => 'O campo quantidade deve ser um número inteiro.',
            'tipo_movimentacao.in' => 'Tipo de movimentação inválido. Escolha 1 para entrada ou 2 para saída.',
        ];

        $request->validate($regras, $feedback);

        Movimentacao::create($request->all());

        return redirect()->route('movimentacao.index', ['produtos' => $produtos]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Movimentacao  $movimentacao
     * @return \Illuminate\Http\Response
     */
    public function show(Movimentacao $movimentacao)
    {
        return view('app.movimentacao.show', ['movimentacao' => $movimentacao]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Movimentacao  $movimentacao
     * @return \Illuminate\Http\Response
     */
    public function edit(Movimentacao $movimentacao)
    {
        $produtos = Produto::all();

        return view('app.movimentacao.edit', ['movimentacao' => $movimentacao, 'produtos' => $produtos]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Movimentacao  $movimentacao
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Movimentacao $movimentacao)
    {
        $produtos = Produto::all();

        $regras = [
            'produto_id' => 'required|exists:produtos,id',
            'quantidade' => 'required|integer',
            'tipo_movimentacao' => 'required|in:1,2'
        ];

        $feedback = [
            'required' => 'O campo :attribute deve ser preenchido.',
            'produto_id.exists' => 'Produto inexistente.',
            'quantidade.integer' => 'O campo quantidade deve ser um número inteiro.',
            'tipo_movimentacao.in' => 'Tipo de movimentação inválido. Escolha 1 para entrada ou 2 para saída.',
        ];

        $request->validate($regras, $feedback);

        $movimentacao->update($request->all());

        return redirect()->route('movimentacao.show', ['movimentacao' => $movimentacao->id, 'produtos' => $produtos]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Movimentacao  $movimentacao
     * @return \Illuminate\Http\Response
     */
    public function destroy(Movimentacao $movimentacao)
    {
        $movimentacao->delete();
        return redirect()->route('movimentacao.index');
    }
}
