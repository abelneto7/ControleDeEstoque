@extends('app.layouts.basico')

@section('titulo', 'Unidade')

@section('conteudo')

    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Listagem de unidades</p>
        </div>
        <div class="menu">
            <ul>
                <li><a href="{{ route('unidade.create') }}">Novo</a></li>
                <li><a href="{{ route('unidade.export') }}">XLSX</a></li>
                <li><a href="{{ route('unidade.exportPDF') }}">PDF</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">

            <div style="width: 30%; margin-left: auto; margin-right: auto;">
                <form method="get" action="{{ route('unidade.index') }}">
                    @csrf
                    <input type="text" value="{{ Request::input('unidade') }}" name="unidade" placeholder="Unidade" class="borda-preta">
                    <input type="text" value="{{ Request::input('descricao') }}" name="descricao" placeholder="Descricao" class="borda-preta">

                    <button type="submit" class="borda-preta">Pesquisar</button>
                    <a href="{{ route('unidade.index') }}" style="text-decoration: none; margin-left: 10px;">
                        <button type="button" class="borda-preta" style="background-color: silver;">Limpar</button>
                    </a>
                </form>
            </div>

            <div style="width: 90%; margin-left: auto; margin-right: auto;">
                {{ $unidades->total() }} Resultados
                <table border="1" width="100%">
                    <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Descricao</th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($unidades as $unidade)
                        <tr>
                            <td>{{ $unidade->unidade }}</td>
                            <td>{{ $unidade->descricao }}</td>

                            <td><a href="{{ route('unidade.show', ['unidade' => $unidade->id]) }}">Visualizar</a></td>
                            <td>
                                <form id="form_{{ $unidade->id }}" method="post" action="{{ route('unidade.destroy', ['unidade' => $unidade->id]) }}">
                                    @method('DELETE')
                                    @csrf
                                    <a href="#" onclick="document.getElementById('form_{{ $unidade->id }}').submit()">Excluir</a>
                                    <!--<button type="submit" style="background-color:red;">Excluir</button>-->
                                </form>
                            </td>
                            <td><a href="{{ route('unidade.edit', ['unidade' => $unidade->id]) }}">Editar</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

                @include('app.unidade.pagination.pagination', ['unidades' => $unidades ])

                <br>
                Exibindo {{ $unidades->count() }} unidades de {{ $unidades->total() }}(de {{ $unidades->firstItem() }} a {{ $unidades->lastItem() }})
            </div>
        </div>
    </div>

@endsection
