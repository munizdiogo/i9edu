<div class="row">
    <div class="col-md-6">
        <label>Descrição*</label>
        <input type="text" class="form-control" name="descricao"
            value="{{ old('descricao', $convenio->descricao ?? '') }}" required>
    </div>
    <div class="col-md-3">
        <label>Modalidade*</label>
        <select class="form-control" name="modalidade" required>
            <option value="Bolsa" @selected(old('modalidade', $convenio->modalidade ?? '') == 'Bolsa')>Bolsa</option>
            <option value="Financiamento" @selected(old('modalidade', $convenio->modalidade ?? '') == 'Financiamento')>
                Financiamento</option>
        </select>
    </div>
    <div class="col-md-3">
        <label>Tipo Financiamento</label>
        <input type="text" class="form-control" name="tipo_financiamento"
            value="{{ old('tipo_financiamento', $convenio->tipo_financiamento ?? '') }}">
    </div>
</div>
<div class="row mt-2">
    <div class="col-md-6">
        <label>Plano de Conta*</label>
        <select name="plano_conta_id" class="form-control" required>
            @foreach($planos as $id => $desc)
                <option value="{{ $id }}" @selected(old('plano_conta_id', $convenio->plano_conta_id ?? '') == $id)>
                    {{ $desc }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="col-md-3">
        <label>Valor*</label>
        <input type="number" step="0.01" class="form-control" name="valor"
            value="{{ old('valor', $convenio->valor ?? '') }}" required>
    </div>
    <div class="col-md-3">
        <label>Tipo*</label>
        <select class="form-control" name="tipo" required>
            <option value="Percentual" @selected(old('tipo', $convenio->tipo ?? '') == 'Percentual')>Percentual</option>
            <option value="Fixo" @selected(old('tipo', $convenio->tipo ?? '') == 'Fixo')>Fixo</option>
        </select>
    </div>
</div>
<div class="row mt-2">
    <div class="col-md-2">
        <label>Status*</label>
        <select class="form-control" name="status" required>
            <option value="Ativo" @selected(old('status', $convenio->status ?? '') == 'Ativo')>Ativo</option>
            <option value="Inativo" @selected(old('status', $convenio->status ?? '') == 'Inativo')>Inativo</option>
        </select>
    </div>
    <div class="col-md-3">
        <label>Perde convênio após vencimento/data limite</label>
        <div class="form-check">
            <input type="checkbox" name="perde_convenio" class="form-check-input" value="1" {{ old('perde_convenio', $convenio->perde_convenio ?? false) ? 'checked' : '' }}>
        </div>
    </div>
    <div class="col-md-4">
        <label>Pagamento Até*</label>
        <select class="form-control" name="pagamento_ate" required>
            <option value="Data de Vencimento" @selected(old('pagamento_ate', $convenio->pagamento_ate ?? '') == 'Data de Vencimento')>Data de Vencimento</option>
            <option value="Data Fixa" @selected(old('pagamento_ate', $convenio->pagamento_ate ?? '') == 'Data Fixa')>Data
                Fixa</option>
        </select>
    </div>
    <div class="col-md-3">
        <label>Dia Limite</label>
        <input type="text" class="form-control" name="dia_limite"
            value="{{ old('dia_limite', $convenio->dia_limite ?? '') }}">
    </div>
</div>
<div class="row mt-2">
    <div class="col-md-3">
        <label>Tipo Vencimento</label>
        <select class="form-control" name="tipo_vencimento">
            <option value="">Selecione</option>
            <option value="Dia Fixo" @selected(old('tipo_vencimento', $convenio->tipo_vencimento ?? '') == 'Dia Fixo')>Dia
                Fixo</option>
            <option value="Data de Vencimento" @selected(old('tipo_vencimento', $convenio->tipo_vencimento ?? '') == 'Data de Vencimento')>Data de Vencimento</option>
        </select>
    </div>
    <div class="col-md-3">
        <label>Início</label>
        <input type="date" class="form-control" name="inicio" value="{{ old('inicio', $convenio->inicio ?? '') }}">
    </div>
    <div class="col-md-3">
        <label>Término</label>
        <input type="date" class="form-control" name="fim" value="{{ old('fim', $convenio->fim ?? '') }}">
    </div>
</div>
<div class="row mt-2">
    <div class="col-md-12">
        <label>Instrução Bancária</label>
        <textarea class="form-control" name="instrucao_bancaria"
            rows="2">{{ old('instrucao_bancaria', $convenio->instrucao_bancaria ?? '') }}</textarea>
    </div>
</div>