@extends('app.layouts.basico')

@section('titulo', 'Produto')

@section('conteudo')

    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Listagem de produtos</p>
        </div>
        <div class="menu">
            <ul>
                <li><a href="{{ route('produto.create') }}">Novo</a></li>
                <li><a href="{{ route('produto-detalhe.create') }}">Adicionar detalhes</a></li>
                <li><a href="{{ route('produto.export') }}">XLSX</a></li>
                <li><a href="{{ route('produto.exportPDF') }}" target="_blank">PDF</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">

            <div style="width: 30%; margin-left: auto; margin-right: auto;">
                <form method="get" action="{{ route('produto.index') }}">
                    @csrf

                    <input type="text" value="{{ Request::input('nome') }}" name="nome" placeholder="Nome do produto" class="borda-preta">
                    <input type="text" value="{{ Request::input('descricao') }}" name="descricao" placeholder="Descrição do produto" class="borda-preta">

                    <button type="submit" class="borda-preta">Pesquisar</button>
                    <a href="{{ route('produto.index') }}" style="text-decoration: none; margin-left: 10px;">
                        <button type="button" class="borda-preta" style="background-color: silver;">Limpar</button>
                    </a>
                </form>
            </div>

            <div style="width: 90%; margin-left: auto; margin-right: auto;">
                {{ $produtos->total() }} Resultados
                <table border="1" width="100%">
                    <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Descrição</th>
                        <th>Nome do Fornecedor</th>
                        <th>Site do Fornecedor</th>
                        <th>Peso</th>
                        <th>Unidade ID</th>
                        <th>Comprimento</th>
                        <th>Altura</th>
                        <th>Largura</th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($produtos as $produto)
                        <tr>
                            <td>{{ $produto->nome }}</td>
                            <td>{{ $produto->descricao }}</td>
                            <td>{{ $produto->fornecedor->nome }}</td>
                            <td>{{ $produto->fornecedor->site }}</td>
                            <td>{{ $produto->peso }}</td>
                            <td>{{ $produto->unidade_id }}</td>
                            <td>{{ $produto->itemDetalhe->comprimento ?? '' }}</td>
                            <td>{{ $produto->itemDetalhe->altura ?? '' }}</td>
                            <td>{{ $produto->itemDetalhe->largura ?? '' }}</td>
                            <td><a href="{{ route('produto.show', ['produto' => $produto->id]) }}">Visualizar</a></td>
                            <td>
                                <form id="form_{{ $produto->id }}" method="post" action="{{ route('produto.destroy', ['produto' => $produto->id]) }}">
                                    @method('DELETE')
                                    @csrf
                                    <a href="#" onclick="document.getElementById('form_{{ $produto->id }}').submit()">Excluir</a>
                                    <!--<button type="submit" style="background-color:red;">Excluir</button>-->
                                </form>
                            </td>
                            <td><a href="{{ route('produto.edit', ['produto' => $produto->id]) }}">Editar</a></td>
                        </tr>

                        <tr>
                            <td colspan="12">
                                <p>Pedidos</p>
                                @foreach($produto->pedidos as $pedido)
                                    <a href="{{ route('pedido-produto.create', ['pedido' => $pedido->id]) }}">
                                        Pedido: {{ $pedido->id }},
                                    </a>
                                @endforeach
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

                @include('app.produto.pagination.pagination', ['produtos' => $produtos])

                <br>
                Exibindo {{ $produtos->count() }} produtos de {{ $produtos->total() }}(de {{ $produtos->firstItem() }} a {{ $produtos->lastItem() }})
            </div>
        </div>
    </div>

@endsection
