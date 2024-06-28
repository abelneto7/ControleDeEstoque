@extends('app.layouts.basico')

@section('titulo', 'Movimentacao')

@section('conteudo')

    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Visualizar Movimentacao</p>
        </div>
        <div class="menu">
            <ul>
                <li><a href="{{ route('movimentacao.index') }}">Voltar</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">
            <div style="width: 30%; margin-left: auto; margin-right: auto;">
                <table border="1" style="text-align: left">
                    <tr>
                        <td>ID:</td>
                        <td>{{ $movimentacao->id }}</td>
                    </tr>
                    <tr>
                        <td>Produto ID:</td>
                        <td>{{ $movimentacao->produto_id }}</td>
                    </tr>
                    <tr>
                        <td>Quantidade:</td>
                        <td>{{ $movimentacao->quantidade }}</td>
                    </tr>
                    <tr>
                        <td>Tipo de Movimentação:</td>
                        <td>{{ $movimentacao->tipo_movimentacao }}</td>
                    </tr>
                </table>
            </div>
        </div>

    </div>

@endsection
