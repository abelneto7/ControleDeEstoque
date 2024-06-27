@extends('site.layouts.basico')

@section('titulo', 'Home')

@section('conteudo')

        <div class="conteudo-destaque">

            <div class="esquerda">
                <div class="informacoes">
                    <h1 class="texto-preto">Sistema Controle de Estoque</h1>
                    <p>Software para gestão de estoque ideal para sua empresa.<p>
                    <div class="chamada">
                        <img src="{{ asset('img/check.png') }}">
                        <span class="texto-branco">Gestão completa e descomplicada</span>
                    </div>
                    <div class="chamada">
                        <img src="{{ asset('img/check.png') }}">
                        <span class="texto-branco">Sua empresa na nuvem</span>
                    </div>
                </div>
            </div>

            <div class="direita">
                <div class="contato">
                    <h1>Contato</h1>
                    <p>Caso tenha qualquer dúvida por favor entre em contato com nossa equipe pelo formulário abaixo.<p>
                    @component('site.layouts._components.form_contato', ['classe' => 'borda-preta', 'motivo_contatos' => $motivo_contatos])
                    @endcomponent
                </div>
            </div>
        </div>
@endsection
