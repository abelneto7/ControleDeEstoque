<h2>Lista de Produtos</h2>

<table>
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
    </tr>
    </thead>
    <tbody>
    @foreach($produtos as $produto)
        <tr>
            <td>{{ $produto->nome }}</td>
            <td>{{ $produto->descricao }}</td>
            <td>{{ $produto->fornecedor->nome ?? ''}}</td>
            <td>{{ $produto->fornecedor->site ?? ''}}</td>
            <td>{{ $produto->peso }}</td>
            <td>{{ $produto->unidade_id }}</td>
            <td>{{ $produto->produtoDetalhe->comprimento ?? '' }}</td>
            <td>{{ $produto->produtoDetalhe->altura ?? '' }}</td>
            <td>{{ $produto->produtoDetalhe->largura ?? '' }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
