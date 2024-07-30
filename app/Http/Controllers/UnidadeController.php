<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUnidadeFormRequest;
use App\Http\Requests\UpdateUnidadeFormRequest;
use Illuminate\Http\Request;
use App\Unidade;

class UnidadeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $unidades = Unidade::where('unidade', 'like', '%'.$request
                ->input('unidade').'%')
            ->where('descricao', 'like', '%'.$request
                ->input('descricao').'%')
            ->paginate(10);

        return view('app.unidade.index', ['unidades' => $unidades, 'request' => $request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('app.unidade.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateUnidadeFormRequest $request)
    {
        $validated = $request->validated();

        $unidade = new Unidade();
        $unidade->unidade = $validated['unidade'];
        $unidade->descricao = $validated['descricao'];
        $unidade->save();

        return redirect()->route('unidade.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Unidade $unidade)
    {
        return view('app.unidade.show', ['unidade' => $unidade]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Unidade $unidade)
    {
        return view('app.unidade.edit', ['unidade' => $unidade]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUnidadeFormRequest $request, Unidade $unidade)
    {
        $unidade->update($request->validated());

        return redirect()->route('unidade.show', ['unidade' => $unidade->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Unidade $unidade)
    {
        $unidade->delete();
        return redirect()->route('unidade.index');
    }
}
