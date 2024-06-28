<h2>Lista de Pedidos</h2>

<table>
    <thead>
    <tr>
        <th>ID</th>
        <th>Cliente</th>
    </tr>
    </thead>
    <tbody>
    @foreach($pedidos as $pedido)
        <tr>
            <td>{{ $pedido->id }}</td>
            <td>{{ $pedido->cliente->nome }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
