

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
    <div class="titulo">Lista de Fornecedores</div>

    <table class="tabela">
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
</body>
</html>
