<div class="card card-primary">
    <div class="card-body">
        <div class="form-group">
            <label>Código*</label>
            <input type="text" name="codigo" class="form-control" required
                value="{{ old('codigo', $etapas_periodos_letivo->codigo ?? '') }}">
        </div>
        <div class="form-group">
            <label>Descrição*</label>
            <input type="text" name="descricao" class="form-control" required
                value="{{ old('descricao', $etapas_periodos_letivo->descricao ?? '') }}">
        </div>
        <div class="form-group">
            <label>Status*</label>
            <select name="status" class="form-control select2bs4">
                <option value="Ativo" {{ old('status', $etapas_periodos_letivo->status ?? '') == 'Ativo' ? 'selected' : '' }}>
                    Ativo</option>
                <option value="Inativo" {{ old('status', $etapas_periodos_letivo->status ?? '') == 'Inativo' ? 'selected' : '' }}>Inativo</option>
            </select>
        </div>
        <div class="form-group">
            <label>Período Letivo*</label>
            <select name="periodo_letivo_id" class="form-control select2bs4" required>
                <option value="">-- selecione --</option>
                @foreach($periodos as $id => $label)
                    <option value="{{ $id }}" {{ old('periodo_letivo_id', $etapas_periodos_letivo->periodo_letivo_id ?? '') == $id ? 'selected' : '' }}>
                        {{ $label }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>
</div>