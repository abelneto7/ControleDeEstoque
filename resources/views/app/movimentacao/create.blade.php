@extends('app.layouts.basico')

@section('titulo', 'Movimentacao')

@section('conteudo')

    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Adicionar Movimentacao</p>
        </div>
        <div class="menu">
            <ul>
                <li><a href="{{ route('movimentacao.index') }}">Voltar</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">
            <div style="width: 30%; margin-left: auto; margin-right: auto;">
                @component('app.movimentacao._components.form_create_edit', ['produtos' => $produtos])
                @endcomponent
            </div>
        </div>

    </div>

@endsection
