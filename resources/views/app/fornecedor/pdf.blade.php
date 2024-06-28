<h2>Lista de Fornecedores</h2>

<table>
    <thead>
    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Site</th>
        <th>UF</th>
        <th>E-mail</th>
    </tr>
    </thead>
    <tbody>
    @foreach($fornecedores as $fornecedor)
        <tr>
            <td>{{ $fornecedor->id }}</td>
            <td>{{ $fornecedor->nome }}</td>
            <td>{{ $fornecedor->site }}</td>
            <td>{{ $fornecedor->uf }}</td>
            <td>{{ $fornecedor->email }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
