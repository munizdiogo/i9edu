<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Dados do Edital</h3>
    </div>
    <div class="card-body">
        <div class="form-row">
            <div class="form-group col-md-2">
                <label>Código</label>
                <input readonly class="form-control" value="{{ $edital->id ?? '' }}">
            </div>
            <div class="form-group col-md-10">
                <label>Descrição*</label>
                <input type="text" name="descricao" class="form-control"
                    value="{{ old('descricao', $edital->descricao ?? '') }}" required>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-4">
                <label>Período Letivo*</label>
                <select name="periodo_letivo_id" class="form-control select2bs4" required>
                    <option value="">— selecione —</option>
                    @foreach($periodos as $id => $nome)
                        <option value="{{ $id }}" {{ old('periodo_letivo_id', $edital->periodo_letivo_id ?? '') == $id ? 'selected' : '' }}>
                            {{ $nome }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-md-2">
                <label>Data Início*</label>
                <input type="date" name="data_inicio" class="form-control"
                    value="{{ old('data_inicio', $edital->data_inicio ?? '') }}" required>
            </div>
            <div class="form-group col-md-2">
                <label>Até*</label>
                <input type="date" name="data_fim" class="form-control"
                    value="{{ old('data_fim', $edital->data_fim ?? '') }}" required>
            </div>
            <div class="form-group col-md-2">
                <label>Visível Até</label>
                <input type="date" name="visivel_ate" class="form-control"
                    value="{{ old('visivel_ate', $edital->visivel_ate ?? '') }}">
            </div>
            <div class="form-group col-md-2">
                <label>Modalidade</label>
                <select name="modalidade" class="form-control select2bs4">
                    @foreach(['Presencial', 'EaD', 'Híbrido'] as $m)
                        <option value="{{ $m }}" {{ old('modalidade', $edital->modalidade ?? '') == $m ? 'selected' : '' }}>
                            {{ $m }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-2">
                <label>Status</label>
                <select name="status" class="form-control select2bs4">
                    <option value="Aberto" {{ old('status', $edital->status ?? '') == 'Aberto' ? 'selected' : '' }}>Aberto
                    </option>
                    <option value="Fechado" {{ old('status', $edital->status ?? '') == 'Fechado' ? 'selected' : '' }}>
                        Fechado
                    </option>
                </select>
            </div>
        </div>
    </div>
</div>

<div class="card card-info">
    <div class="card-header">
        <h3 class="card-title">Opções para o Enade</h3>
    </div>
    <div class="card-body">
        <div class="form-row">
            <div class="form-group col-md-3">
                <label>Nota Mínima Enade</label>
                <input type="number" step="0.01" name="nota_minima_enade" class="form-control"
                    value="{{ old('nota_minima_enade', $edital->nota_minima_enade ?? '') }}">
            </div>
            <div class="form-group col-md-3">
                <label>Enade Ano Início</label>
                <input type="number" name="enade_ano_inicio" class="form-control"
                    value="{{ old('enade_ano_inicio', $edital->enade_ano_inicio ?? '') }}">
            </div>
            <div class="form-group col-md-3">
                <label>Enade Ano Fim</label>
                <input type="number" name="enade_ano_fim" class="form-control"
                    value="{{ old('enade_ano_fim', $edital->enade_ano_fim ?? '') }}">
            </div>
        </div>
    </div>
</div>

@if(!str_contains(Route::current()->getName(), 'show'))
    <div class="card-footer text-right">
        <a href="{{ route('editais.index') }}" class="btn btn-default">Voltar</a>
        <button type="submit" class="btn btn-success">Salvar</button>
    </div>
@endif