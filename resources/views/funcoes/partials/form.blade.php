<div class="card card-primary">
    <div class="card-body">
        <div class="form-row">
            <div class="form-group col-md-2">
                <label>Código*</label>
                <input type="number" name="codigo" class="form-control" required
                    value="{{ old('codigo', $funcao->codigo ?? '') }}">
            </div>
            <div class="form-group col-md-6">
                <label>Descrição*</label>
                <input type="text" name="descricao" class="form-control" required
                    value="{{ old('descricao', $funcao->descricao ?? '') }}">
            </div>
            <div class="form-group col-md-2">
                <label>Status*</label>
                <select name="status" class="form-control select2bs4" required>
                    <option value="Ativo" {{ old('status', $funcao->status ?? '') == 'Ativo' ? 'selected' : '' }}>Ativo
                    </option>
                    <option value="Inativo" {{ old('status', $funcao->status ?? '') == 'Inativo' ? 'selected' : '' }}>
                        Inativo
                    </option>
                </select>
            </div>
        </div>
    </div>
</div>
@if(!str_contains(Route::current()->getName(), 'show'))
    <div class="mt-3 text-right pb-5">
        <a href="{{ route('funcoes.index') }}" class="btn btn-default">Voltar</a>
        <button type="submit" class="btn btn-success">Salvar</button>
    </div>
@endif