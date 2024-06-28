
@if(isset($movimentacao->id))

    <form method="post" action="{{ route('movimentacao.update', ['movimentacao' => $movimentacao->id]) }}">
        @csrf
        @method('PUT')

        <select name="produto_id" class="borda-preta">
            <option value="">Selecione um Produto</option>
            @foreach($produtos as $produto)
                <option value="{{ $produto->id }}" {{ $movimentacao->produto_id == $produto->id ? 'selected' : '' }}>
                    {{ $produto->nome }}
                </option>
            @endforeach
        </select>
        {{ $errors->has('produto_id') ? $errors->first('produto_id') : '' }}

        <input type="number" value="{{ $movimentacao->quantidade ?? old('quantidade') }}" name="quantidade" placeholder="Quantidade" class="borda-preta">
        {{ $errors->has('quantidade') ? $errors->first('quantidade') : '' }}

        <select name="tipo_movimentacao" class="borda-preta">
            <option value="">Selecione o Tipo de Movimentação</option>
            <option value="1" {{ $movimentacao->tipo_movimentacao == 1 ? 'selected' : '' }}>Entrada</option>
            <option value="2" {{ $movimentacao->tipo_movimentacao == 2 ? 'selected' : '' }}>Saída</option>
        </select>
        {{ $errors->has('tipo_movimentacao') ? $errors->first('tipo_movimentacao') : '' }}

        <button type="submit" class="borda-preta">Atualizar</button>
    </form>
@else
    <form method="post" action="{{ route('movimentacao.store') }}">
        @csrf
        <select name="produto_id" class="borda-preta">
            <option value="">Selecione um Produto</option>
            @foreach($produtos as $produto)
                <option value="{{ $produto->id }}" {{ request('produto_id') == $produto->id ? 'selected' : '' }}>
                    {{ $produto->nome }}
                </option>
            @endforeach
        </select>
        {{ $errors->has('produto_id') ? $errors->first('produto_id') : '' }}

        <input type="number" value="{{ $movimentacao->quantidade ?? old('quantidade') }}" name="quantidade" placeholder="Quantidade" class="borda-preta">
        {{ $errors->has('quantidade') ? $errors->first('quantidade') : '' }}

        <select name="tipo_movimentacao" class="borda-preta">
            <option value="">Selecione o Tipo de Movimentação</option>
            <option value="1" {{ request('tipo_movimentacao') == 1 ? 'selected' : '' }}>Entrada</option>
            <option value="2" {{ request('tipo_movimentacao') == 2 ? 'selected' : '' }}>Saída</option>
        </select>
        {{ $errors->has('tipo_movimentacao') ? $errors->first('tipo_movimentacao') : '' }}

        <button type="submit" class="borda-preta">Cadastrar</button>
    </form>
@endif

