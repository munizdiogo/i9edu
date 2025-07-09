<div class="form-group">
    <label for="titulo">Título *</label>
    <input type="text" name="titulo" class="form-control" value="{{ old('titulo', $documento->titulo ?? '') }}"
        required>
</div>
<div class="form-group">
    <label for="nome_exibicao">Nome de exibição</label>
    <input type="text" name="nome_exibicao" class="form-control"
        value="{{ old('nome_exibicao', $documento->nome_exibicao ?? '') }}">
    <small class="text-muted">Nome exibido no título do documento no Portal</small>
</div>
<div class="row">
    <div class="col-md-6">
        <label>Status *</label>
        <select name="status" class="form-control" required>
            <option value="Ativo" {{ old('status', $documento->status ?? '') == 'Ativo' ? 'selected' : '' }}>Ativo</option>
            <option value="Inativo" {{ old('status', $documento->status ?? '') == 'Inativo' ? 'selected' : '' }}>Inativo
            </option>
        </select>
    </div>
    <div class="col-md-6">
        <label>Tipo *</label>
        <select name="tipo" class="form-control" required>
            <option value="Matrícula" {{ old('tipo', $documento->tipo ?? '') == 'Matrícula' ? 'selected' : '' }}>Matrícula
            </option>
            <option value="Contrato" {{ old('tipo', $documento->tipo ?? '') == 'Contrato' ? 'selected' : '' }}>Contrato
            </option>
            <option value="Outro" {{ old('tipo', $documento->tipo ?? '') == 'Outro' ? 'selected' : '' }}>Outro</option>
        </select>
    </div>
</div>
<div class="form-group mt-2">
    <label for="template">Template (DOCX)</label>
    <input type="file" name="template" class="form-control" accept=".doc,.docx">
    @if(!empty($documento->template_path))
        <small class="text-muted">
            Arquivo atual: <a href="{{ Storage::url($documento->template_path) }}" target="_blank">Download</a>
        </small>
    @endif
</div>
<div class="form-group mt-2">
    <div class="form-check">
        <input type="checkbox" name="usar_jasper" class="form-check-input" id="usar_jasper" {{ old('usar_jasper', $documento->usar_jasper ?? false) ? 'checked' : '' }}>
        <label for="usar_jasper" class="form-check-label">Utilizar relatório Jasper.</label>
    </div>
    <div class="form-check">
        <input type="checkbox" name="permitir_docx" class="form-check-input" id="permitir_docx" {{ old('permitir_docx', $documento->permitir_docx ?? false) ? 'checked' : '' }}>
        <label for="permitir_docx" class="form-check-label">Permite ser emitido no formato DOCX.</label>
    </div>
    <div class="form-check">
        <input type="checkbox" name="obrigatorio_informar_data" class="form-check-input" id="obrigatorio_informar_data"
            {{ old('obrigatorio_informar_data', $documento->obrigatorio_informar_data ?? false) ? 'checked' : '' }}>
        <label for="obrigatorio_informar_data" class="form-check-label">Obrigatório informar data (somente para
            relatórios Jasper).</label>
    </div>
    <div class="form-check">
        <input type="checkbox" name="processar_historico_disciplinas" class="form-check-input"
            id="processar_historico_disciplinas" {{ old('processar_historico_disciplinas', $documento->processar_historico_disciplinas ?? false) ? 'checked' : '' }}>
        <label for="processar_historico_disciplinas" class="form-check-label">Processar histórico de disciplinas
            cursadas.</label>
    </div>
</div>