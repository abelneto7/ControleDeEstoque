
@if(isset($unidade->id))
    <form method="post" action="{{ route('unidade.update', ['unidade' => $unidade->id]) }}">
        @csrf
        @method('PUT')
        <input type="text" value="{{ $unidade->unidade ?? old('unidade') }}" name="unidade" placeholder="Unidade" class="borda-preta">
        {{ $errors->has('unidade') ? $errors->first('unidade') : '' }}

        <input type="text" value="{{ $unidade->descricao ?? old('descricao') }}" name="descricao" placeholder="descricao" class="borda-preta">
        {{ $errors->has('descricao') ? $errors->first('descricao') : '' }}

        <button type="submit" class="borda-preta">Atualizar</button>
    </form>
@else
    <form method="post" action="{{ route('unidade.store') }}">
        @csrf
        <input type="text" value="{{ $unidade->unidade ?? old('unidade') }}" name="unidade" placeholder="Unidade" class="borda-preta">
        {{ $errors->has('unidade') ? $errors->first('unidade') : '' }}

        <input type="text" value="{{ $unidade->descricao ?? old('descricao') }}" name="descricao" placeholder="descricao" class="borda-preta">
        {{ $errors->has('descricao') ? $errors->first('descricao') : '' }}

        <button type="submit" class="borda-preta">Cadastrar</button>
    </form>
@endif

