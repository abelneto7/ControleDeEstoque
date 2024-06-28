<h2>Lista de Movimentações</h2>

<table>
    <thead>
    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Quantidade</th>
        <th>Tipo de Movimentação</th>
        <th>Produto</th>
    </tr>
    </thead>
    <tbody>
    @foreach($movimentacoes as $movimentacao)
        <tr>
            <td>{{ $movimentacao->id }}</td>
            <td>{{ $movimentacao->quantidade }}</td>
            <td>{{ $movimentacao->tipo_movimentacao_nome }}</td>
            @foreach($produtos as $produto)
            <td>{{ $movimentacao->produto->nome }}</td>
            @endforeach
        </tr>
    @endforeach
    </tbody>
</table>
