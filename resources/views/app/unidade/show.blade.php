@extends('app.layouts.basico')

@section('titulo', 'Unidade')

@section('conteudo')

    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Visualizar Unidade</p>
        </div>
        <div class="menu">
            <ul>
                <li><a href="{{ route('unidade.index') }}">Voltar</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">
            <div style="width: 30%; margin-left: auto; margin-right: auto;">
                <table border="1" style="text-align: left">
                    <tr>
                        <td>ID:</td>
                        <td>{{ $unidade->id }}</td>
                    </tr>
                    <tr>
                        <td>Unidade:</td>
                        <td>{{ $unidade->unidade }}</td>
                    </tr>
                    <tr>
                        <td>Descricao:</td>
                        <td>{{ $unidade->descricao }}</td>
                    </tr>
                </table>
            </div>
        </div>

    </div>

@endsection
