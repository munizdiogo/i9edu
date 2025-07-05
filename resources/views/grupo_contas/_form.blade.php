<div class="form-group">
    <label for="descricao">Descrição*</label>
    <input type="text" name="descricao" class="form-control" required
        value="{{ old('descricao', $grupoConta->descricao ?? '') }}">
</div>

<div class="form-group">
    <label for="sigla">Sigla*</label>
    <input type="text" name="sigla" class="form-control" required value="{{ old('sigla', $grupoConta->sigla ?? '') }}">
</div>

<div class="form-group">
    <label for="ordem">Ordem*</label>
    <input type="text" name="ordem" class="form-control" required value="{{ old('ordem', $grupoConta->ordem ?? '') }}">
</div>

<div class="form-group">
    <label for="nivel">Nível*</label>
    <select name="nivel" class="form-control" required>
        @for($i = 1; $i <= 5; $i++)
            <option value="{{ $i }}" {{ old('nivel', $grupoConta->nivel ?? '') == $i ? 'selected' : '' }}>{{ $i }}</option>
        @endfor
    </select>
</div>

<div class="form-group">
    <label for="tipo_resultado">Tipo Resultado*</label>
    <select name="tipo_resultado" class="form-control" required>
        <option value="VALOR" {{ old('tipo_resultado', $grupoConta->tipo_resultado ?? '') == 'VALOR' ? 'selected' : '' }}>
            VALOR</option>
        <option value="PERCENTUAL" {{ old('tipo_resultado', $grupoConta->tipo_resultado ?? '') == 'PERCENTUAL' ? 'selected' : '' }}>PERCENTUAL</option>
    </select>
</div>

<div class="form-group">
    <label for="operacao">Operação*</label>
    <select name="operacao" class="form-control" required>
        <option value="(+)" {{ old('operacao', $grupoConta->operacao ?? '') == 'SOMA' ? 'selected' : '' }}>(+) Soma
        </option>
        <option value="(-)" {{ old('operacao', $grupoConta->operacao ?? '') == 'SUBTRACAO' ? 'selected' : '' }}>(-)
            Subtração</option>
    </select>
</div>

<div class="form-check">
    <input class="form-check-input" type="checkbox" name="dre" id="dre" value="1" {{ old('dre', $grupoConta->dre ?? false) ? 'checked' : '' }}>
    <label class="form-check-label" for="dre">DRE?</label>
</div>

<div class="form-check">
    <input class="form-check-input" type="checkbox" name="mensalidade" id="mensalidade" value="1" {{ old('mensalidade', $grupoConta->mensalidade ?? false) ? 'checked' : '' }}>
    <label class="form-check-label" for="mensalidade">Mensalidade?</label>
</div>

<div class="form-check">
    <input class="form-check-input" type="checkbox" name="apresentar_relatorios" id="apresentar_relatorios" value="1" {{ old('apresentar_relatorios', $grupoConta->apresentar_relatorios ?? false) ? 'checked' : '' }}>
    <label class="form-check-label" for="apresentar_relatorios">Apresentar nos relatórios?</label>
</div>