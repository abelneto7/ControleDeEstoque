
@if(isset($produto_detalhe->id))
    <form method="post" action="{{ route('produto-detalhe.update', ['produto_detalhe' => $produto_detalhe->id]) }}">
        @csrf
        @method('PUT')
        @else
            <form method="post" action="{{ route('produto-detalhe.store') }}">
                @csrf
                @endif
                <select name="produto_id" class="borda-preta">
                    <option value="">-- Selecione o Produto --</option>
                    @foreach($produtos as $produto)
                        <option value="{{ $produto->id }}" {{ (isset($produto_detalhe->produto_id) ? $produto_detalhe->produto_id : old('produto_id')) == $produto->id ? 'selected' : '' }}>
                            {{ $produto->nome }}
                        </option>
                    @endforeach
                </select>
                {{ $errors->has('produto_id') ? $errors->first('produto_id') : '' }}

                <input type="text" value="{{ $produto_detalhe->comprimento ?? old('comprimento') }}" name="comprimento" placeholder="Comprimento" class="borda-preta">
                {{ $errors->has('comprimento') ? $errors->first('comprimento') : '' }}

                <input type="text" value="{{ $produto_detalhe->largura ?? old('largura') }}" name="largura" placeholder="Largura" class="borda-preta">
                {{ $errors->has('largura') ? $errors->first('largura') : '' }}

                <input type="text" value="{{ $produto_detalhe->altura ?? old('altura') }}" name="altura" placeholder="Altura" class="borda-preta">
                {{ $errors->has('altura') ? $errors->first('altura') : '' }}

                <select name="unidade_id">
                    <option>-- Selecione a Unidade de Medida --</option>

                    @foreach($unidades as $unidade)
                        <option value="{{ $unidade->id }}" {{ $produto_detalhe->unidade_id ?? old('unidade_id') == $unidade->id ? 'selected' : ''}}>{{ $unidade->descricao }}</option>
                    @endforeach
                </select>
                {{ $errors->has('unidade_id') ? $errors->first('unidade_id') : '' }}

                <button type="submit" class="borda-preta">Cadastrar</button>
            </form>
