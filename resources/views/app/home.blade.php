@extends('app.layouts.basico')

@section('titulo', 'Home')

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina">
            <h1>Bem-vindo!</h1>
        </div>

        <div class="informacao-pagina">
            <p>Estamos felizes em tê-lo de volta. Explore o sistema de controle de estoque usando o menu acima.</p>
            <p>Se precisar de ajuda, entre em contato com o suporte em <a href="mailto:abel.fullstack@gmail.com">abel.fullstack@gmail.com</a>.</p>
        </div>
    </div>
@endsection
