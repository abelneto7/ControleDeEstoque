@extends('site.layouts.basico')

@section('titulo', $titulo)

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina">
            <h1>Cadastro</h1>
        </div>

        <div class="informacao-pagina">
            <div style="width: 30%; margin-left: auto; margin-right: auto;">
                <form action={{ route('site.register') }} method="post">
                    @csrf
                    <input name="nome" value="{{ old('name') }}" type="text" placeholder="Nome" class="borda-preta">
                    @if($errors->has('nome'))
                        <div class="error">{{ $errors->first('nome') }}</div>
                    @endif

                    <input name="usuario" value="{{ old('usuario') }}" type="text" placeholder="Usuário" class="borda-preta">
                    @if($errors->has('usuario'))
                        <div class="error">{{ $errors->first('usuario') }}</div>
                    @endif

                    <input name="senha" value="{{ old('senha') }}" type="password" placeholder="Senha" class="borda-preta">
                    @if($errors->has('senha'))
                        <div class="error">{{ $errors->first('senha') }}</div>
                    @endif

                    <button type="submit" class="borda-preta">Cadastrar</button>
                </form>
            </div>
        </div>
    </div>
@endsection
