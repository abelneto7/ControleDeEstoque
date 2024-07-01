@extends('app.layouts.basico')

@section('titulo', 'Movimentacao')

@section('conteudo')

    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Movimentações</p>
        </div>
        <div class="menu">
            <ul>
                <li><a href="{{ route('movimentacao.create') }}">Novo</a></li>
                <li><a href="{{ route('movimentacao.export') }}">XLSX</a></li>
                <li><a href="{{ route('movimentacao.exportPDF') }}" target="_blank">PDF</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">

            <div style="width: 30%; margin-left: auto; margin-right: auto;">
                <form method="get" action="{{ route('movimentacao.index') }}">
                    @csrf
                    <select name="produto_id" class="borda-preta">
                        <option value="">Selecione um Produto</option>
                        @foreach($produtos as $produto)
                            <option value="{{ $produto->id }}" {{ request('produto_id') == $produto->id ? 'selected' : '' }}>
                                {{ $produto->nome }}
                            </option>
                        @endforeach
                    </select>

                    <input type="number" value="{{ Request::input('quantidade') }}" name="quantidade" placeholder="Quantidade" class="borda-preta">

                    <select name="tipo_movimentacao" class="borda-preta">
                        <option value="">Selecione o Tipo de Movimentação</option>
                        <option value="1" {{ request('tipo_movimentacao') == 1 ? 'selected' : '' }}>Entrada</option>
                        <option value="2" {{ request('tipo_movimentacao') == 2 ? 'selected' : '' }}>Saída</option>
                    </select>

                    <button type="submit" class="borda-preta">Pesquisar</button>
                    <a href="{{ route('movimentacao.index') }}" style="text-decoration: none; margin-left: 10px;">
                        <button type="button" class="borda-preta" style="background-color: silver;">Limpar</button>
                    </a>
                </form>
            </div>

            <div style="width: 90%; margin-left: auto; margin-right: auto;">
                {{ $movimentacoes->total() }} Resultados
                <table border="1" width="100%">
                    <thead>
                    <tr>
                        <th>Produto_id</th>
                        <th>Quantidade</th>
                        <th>Tipo de movimentação</th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($movimentacoes as $movimentacao)
                        <tr>
                            <td>{{ $movimentacao->produto->nome }}</td>
                            <td>{{ $movimentacao->quantidade }}</td>
                            <td>{{ $movimentacao->tipo_movimentacao_nome }}</td>

                            <td><a href="{{ route('movimentacao.show', ['movimentacao' => $movimentacao->id]) }}">Visualizar</a></td>
                            <td>
                                <form id="form_{{ $movimentacao->id }}" method="post" action="{{ route('movimentacao.destroy', ['movimentacao' => $movimentacao->id]) }}">
                                    @method('DELETE')
                                    @csrf
                                    <a href="#" onclick="document.getElementById('form_{{ $movimentacao->id }}').submit()">Excluir</a>
                                    <!--<button type="submit" style="background-color:red;">Excluir</button>-->
                                </form>
                            </td>
                            <td><a href="{{ route('movimentacao.edit', ['movimentacao' => $movimentacao->id]) }}">Editar</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

                @include('app.movimentacao.pagination.pagination', ['movimentacoes' => $movimentacoes ])

                <br>
                Exibindo {{ $movimentacoes->count() }} movimentações de {{ $movimentacoes->total() }}(de {{ $movimentacoes->firstItem() }} a {{ $movimentacoes->lastItem() }})
            </div>
        </div>
    </div>

@endsection
