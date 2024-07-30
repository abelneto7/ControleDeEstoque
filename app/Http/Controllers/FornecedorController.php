<?php

namespace App\Http\Controllers;
use App\Fornecedor;

use App\Http\Requests\StoreFornecedorFormRequest;
use App\Http\Requests\UpdateFornecedorFormRequest;
use Illuminate\Http\Request;

class FornecedorController extends Controller
{
    public function index(){
        return view('app.fornecedor.index');
    }

    public function listar(Request $request) {
        $fornecedores = Fornecedor::with('produtos')->where('nome', 'like', '%'.$request->input('nome').'%')
            ->where('site', 'like', '%'.$request->input('site').'%')
            ->where('uf', 'like', '%'.$request->input('uf').'%')
            ->where('email', 'like', '%'.$request->input('email').'%')
            ->paginate(10);

        return view('app.fornecedor.listar', ['fornecedores' => $fornecedores, 'request' => $request->all()]);
    }

    public function adicionar(StoreFornecedorFormRequest $request)
    {
        $validated = $request->validated();

        Fornecedor::create($validated);

        return view('app.fornecedor.adicionar');
    }

    public function editar(UpdateFornecedorFormRequest $request, $msg = '')
    {
        $validated = $request->validated();
        $fornecedor = Fornecedor::find($request->input('id'));
        $fornecedor->update($validated);

        return redirect()->route('app.fornecedor.editar', ['id' => $request->input('id'), 'msg' => $msg]);
    }

    public function excluir($id)
    {
        Fornecedor::find($id)->delete();
        //Fornecedor::find($id)->forceDelete();

        return redirect()->route('app.fornecedor');
    }
}
