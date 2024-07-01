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

        <div class="titulo">Lista de Clientes</div>

        <table class="tabela">
            <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
            </tr>
            </thead>
            <tbody>
            @foreach($clientes as $cliente)
                <tr>
                    <td>{{ $cliente->id }}</td>
                    <td>{{ $cliente->nome }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </body>
</html>

