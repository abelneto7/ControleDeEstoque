@extends('app.layouts.basico')

@section('titulo', 'Pedido')

@section('conteudo')

    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Listagem de Pedidos</p>
        </div>
        <div class="menu">
            <ul>
                <li><a href="{{ route('pedido.create') }}">Novo</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">
            <div style="width: 30%; margin-left: auto; margin-right: auto;">
                <form action="{{ route('pedido.index') }}" method="GET">
                    <select name="cliente_id" class="borda-preta">
                        <option value="">Selecione um Cliente</option>
                        @foreach ($pedidos as $pedido)
                            <option value="{{ $pedido->cliente_id }}">{{ $pedido->cliente->nome }}</option>
                        @endforeach
                    </select>

                    <button type="submit" class="borda-preta">Pesquisar</button>
                    <a href="{{ route('pedido.index') }}" style="text-decoration: none; margin-left: 10px;">
                        <button type="button" class="borda-preta" style="background-color: silver;">Limpar</button>
                    </a>
                </form>
            </div>

            <div style="width: 90%; margin-left: auto; margin-right: auto;">
                {{ $pedidos->total() }} Resultados
                <table border="1" width="100%">
                    <thead>
                    <tr>
                        <th>ID pedido</th>
                        <th>Cliente</th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($pedidos as $pedido)
                        <tr>
                            <td>{{ $pedido->id }}</td>
                            <td>{{ $pedido->cliente->nome }}</td>
                            <td><a href="{{ route('pedido-produto.create', ['pedido' => $pedido->id]) }}">Adicionar Produtos</a></td>

                            <td><a href="{{ route('pedido.show', ['pedido' => $pedido->id]) }}">Visualizar</a></td>
                            <td>
                                <form id="form_{{ $pedido->id }}" method="post" action="{{ route('pedido.destroy', ['pedido' => $pedido->id]) }}">
                                    @method('DELETE')
                                    @csrf
                                    <a href="#" onclick="document.getElementById('form_{{ $pedido->id }}').submit()">Excluir</a>
                                    <!--<button type="submit" style="background-color:red;">Excluir</button>-->
                                </form>
                            </td>
                            <td><a href="{{ route('pedido.edit', ['pedido' => $pedido->id]) }}">Editar</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

                @include('app.pedido.pagination.pagination', ['pedidos' => $pedidos ])

                <br>
                Exibindo {{ $pedidos->count() }} pedidos de {{ $pedidos->total() }}(de {{ $pedidos->firstItem() }} a {{ $pedidos->lastItem() }})
            </div>
        </div>
    </div>

@endsection
