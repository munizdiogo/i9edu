<div class="card card-primary">
    <div class="card-body">
        <div class="form-group">
            <label>Código*</label>
            <input type="text" name="codigo" class="form-control" required
                value="{{ old('codigo', $modulo->codigo ?? '') }}">
        </div>
        <div class="form-group">
            <label>Descrição*</label>
            <input type="text" name="descricao" class="form-control" required
                value="{{ old('descricao', $modulo->descricao ?? '') }}">
        </div>
        <div class="form-group">
            <label>Nome Reduzido*</label>
            <input type="text" name="nome_reduzido" class="form-control" required
                value="{{ old('nome_reduzido', $modulo->nome_reduzido ?? '') }}">
        </div>
        <div class="form-group">
            <label>Ordem*</label>
            <input type="number" name="ordem" class="form-control" required
                value="{{ old('ordem', $modulo->ordem ?? 0) }}">
        </div>
        <div class="form-group">
            <label>Status*</label>
            <select name="status" class="form-control select2bs4">
                <option value="Ativo" {{ old('status', $modulo->status ?? '') == 'Ativo' ? 'selected' : '' }}>Ativo
                </option>
                <option value="Inativo" {{ old('status', $modulo->status ?? '') == 'Inativo' ? 'selected' : '' }}>Inativo
                </option>
            </select>
        </div>
        <div class="form-group">
            <label>Próximo Módulo</label>
            <select name="prox_modulo_id" class="form-control select2bs4">
                <option value=""></option>
                @foreach($proximos as $id => $desc)
                    <option value="{{ $id }}" {{ old('prox_modulo_id', $modulo->prox_modulo_id ?? '') == $id ? 'selected' : '' }}>
                        {{ $desc }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>
</div>

@if(!str_contains(Route::current()->getName(), 'show'))
    <div class="card-footer text-right">
        <a href="{{ route('modulos.index') }}" class="btn btn-default">Voltar</a>
        <button type="submit" class="btn btn-success">Salvar</button>
    </div>
@endif