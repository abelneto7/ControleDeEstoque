
@if(isset($cliente->id))
    <form method="post" action="{{ route('cliente.update', ['cliente' => $cliente->id]) }}">
        @csrf
        @method('PUT')
        <input type="text" value="{{ $cliente->nome ?? old('nome') }}" name="nome" placeholder="Nome" class="borda-preta">
        {{ $errors->has('nome') ? $errors->first('nome') : '' }}

        <button type="submit" class="borda-preta">Atualizar</button>
    </form>
@else
    <form method="post" action="{{ route('cliente.store') }}">
        @csrf
        <input type="text" value="{{ $cliente->nome ?? old('nome') }}" name="nome" placeholder="Nome" class="borda-preta">
        {{ $errors->has('nome') ? $errors->first('nome') : '' }}

        <button type="submit" class="borda-preta">Cadastrar</button>
    </form>
@endif

