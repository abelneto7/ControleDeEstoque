<html>
<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

    <style>
        .page-break {
            page-break-after: always;
        }
        .titulo{
            border: 1px;
            background-color: #c2c2c2;
            text-align: center;
            width: 100%;
            text-transform: uppercase;
            font-weight: bold;
            margin-bottom: 25px;
        }

        .tabela{
            width: 100%;
        }

        table th{
            text-align: left;
        }
    </style>
</head>

<body>
    <div class="titulo">Lista de Movimentações</div>

    <table class="tabela">
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
</body>
</html>
