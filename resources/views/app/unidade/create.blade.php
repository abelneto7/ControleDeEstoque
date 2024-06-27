@extends('app.layouts.basico')

@section('titulo', 'Unidade')

@section('conteudo')

    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Adicionar Unidade</p>
        </div>
        <div class="menu">
            <ul>
                <li><a href="{{ route('unidade.index') }}">Voltar</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">
            <div style="width: 30%; margin-left: auto; margin-right: auto;">
                @component('app.unidade._components.form_create_edit')
                @endcomponent
            </div>
        </div>

    </div>

@endsection
