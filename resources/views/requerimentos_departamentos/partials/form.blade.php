<div class="card card-primary">
    <div class="card-body">
        <div class="form-group">
            <label>Descrição</label>
            <input type="text" name="descricao"
                value="{{ old('descricao', $requerimento_departamento->descricao ?? '') }}" class="form-control"
                required>
        </div>

        <div class="form-group">
            <label>Tipo</label>
            <input type="text" name="tipo" value="{{ old('tipo', $requerimento_departamento->tipo ?? '') }}"
                class="form-control" required>
        </div>

        <div class="form-group">
            <label>Status</label>
            <select name="status" class="form-control" required>
                <option value="Ativo" {{ old('status', $requerimento_departamento->status ?? '') == 'Ativo' ? 'selected' : '' }}>
                    Ativo</option>
                <option value="Inativo" {{ old('status', $requerimento_departamento->status ?? '') == 'Inativo' ? 'selected' : '' }}>Inativo</option>
            </select>
        </div>
    </div>
</div>




@if(!str_contains(Route::current()->getName(), 'show'))
    <div class="card-footer text-right">
        <a href="{{ route('requerimentos_departamentos.index') }}" class="btn btn-default">Voltar</a>
        <button type="submit" class="btn btn-success">Salvar</button>
    </div>
@endif