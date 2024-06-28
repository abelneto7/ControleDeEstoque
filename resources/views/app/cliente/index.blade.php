@extends('app.layouts.basico')

@section('titulo', 'Cliente')

@section('conteudo')

    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Listagem de clientes</p>
        </div>
        <div class="menu">
            <ul>
                <li><a href="{{ route('cliente.create') }}">Novo</a></li>
                <li><a href="{{ route('cliente.export') }}">XLSX</a></li>
                <li><a href="{{ route('cliente.exportPDF') }}">PDF</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">

            <div style="width: 30%; margin-left: auto; margin-right: auto;">
                <form method="get" action="{{ route('cliente.index') }}">
                    @csrf
                    <input type="text" value="{{ old('nome') }}" name="nome" placeholder="Nome" class="borda-preta">
                    <button type="submit" class="borda-preta">Pesquisar</button>
                        <a href="{{ route('cliente.index') }}" style="text-decoration: none; margin-left: 10px;">
                            <button type="button" class="borda-preta" style="background-color: silver;">Limpar</button>
                        </a>
                </form>
            </div>

            <div style="width: 90%; margin-left: auto; margin-right: auto;">
                {{ $clientes->total() }} Resultados
                <table border="1" width="100%">
                    <thead>
                    <tr>
                        <th>Nome</th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($clientes as $cliente)
                        <tr>
                            <td>{{ $cliente->nome }}</td>

                            <td><a href="{{ route('cliente.show', ['cliente' => $cliente->id]) }}">Visualizar</a></td>
                            <td>
                                <form id="form_{{ $cliente->id }}" method="post" action="{{ route('cliente.destroy', ['cliente' => $cliente->id]) }}">
                                    @method('DELETE')
                                    @csrf
                                    <a href="#" onclick="document.getElementById('form_{{ $cliente->id }}').submit()">Excluir</a>
                                    <!--<button type="submit" style="background-color:red;">Excluir</button>-->
                                </form>
                            </td>
                            <td><a href="{{ route('cliente.edit', ['cliente' => $cliente->id]) }}">Editar</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

                @include('app.cliente.pagination.pagination', ['clientes' => $clientes ])

                <br>
                Exibindo {{ $clientes->count() }} clientes de {{ $clientes->total() }}(de {{ $clientes->firstItem() }} a {{ $clientes->lastItem() }})
            </div>
        </div>
    </div>

@endsection
