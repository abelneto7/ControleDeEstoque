<h2>Lista de Unidades</h2>

<table>
    <thead>
    <tr>
        <th>Nome</th>
        <th>Descrição</th>
    </tr>
    </thead>
    <tbody>
    @foreach($unidades as $unidade)
        <tr>
            <td>{{ $unidade->unidade }}</td>
            <td>{{ $unidade->descricao }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
