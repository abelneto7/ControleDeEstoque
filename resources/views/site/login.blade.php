@extends('site.layouts.basico')

@section('titulo', $titulo)

@section('conteudo')


    <div class="conteudo-pagina">
        <div class="titulo-pagina">
            <h1>Login</h1>
        </div>

        <div class="informacao-pagina">
            <div style="width: 30%; margin-left: auto; margin-right: auto;">
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <form action={{ route('site.login') }} method="post">
                    @csrf
                    <input name="usuario" value="{{ old('usuario') }}" type="text" placeholder="Usuário" class="borda-preta">
                    {{ $errors->has('usuario') ? $errors->first('usuario') : '' }}

                    <input name="senha" value="{{ old('senha') }}" type="password" placeholder="Senha" class="borda-preta">
                    {{ $errors->has('senha') ? $errors->first('senha') : '' }}

                    <button type="submit" class="borda-preta">Acessar</button>

                    <p>Não tem cadastro? <a href="{{ route('site.register') }}">Cadastre-se</a></p>
                </form>
                {{ isset($erro) && $erro!='' ? $erro : '' }}
            </div>
        </div>
    </div>
@endsection
