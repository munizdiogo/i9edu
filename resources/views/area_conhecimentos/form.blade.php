<div class="card card-primary">
    <div class="card-body">
        <div class="form-group">
            <label>Código*</label>
            <input type="text" name="codigo" class="form-control" required
                value="{{ old('codigo', $area_conhecimento->codigo ?? '') }}">
        </div>
        <div class="form-group">
            <label>Descrição*</label>
            <input type="text" name="descricao" class="form-control" required
                value="{{ old('descricao', $area_conhecimento->descricao ?? '') }}">
        </div>
        <div class="form-group">
            <label>Status*</label>
            <select name="status" class="form-control select2bs4">
                <option value="Ativo" {{ (old('status', $area_conhecimento->status ?? '') == 'Ativo') ? 'selected' : '' }}>Ativo</option>
                <option value="Inativo" {{ (old('status', $area_conhecimento->status ?? '') == 'Inativo') ? 'selected' : '' }}>Inativo</option>
            </select>
        </div>
    </div>
</div>