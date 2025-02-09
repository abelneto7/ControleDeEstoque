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

    <div class="titulo">Lista de Produtos</div>

    <table class="tabela">
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
</body>
</html>
