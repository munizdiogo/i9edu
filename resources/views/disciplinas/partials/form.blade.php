<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Dados da Disciplina</h3>
    </div>
    <div class="card-body">
        <div class="form-row">
            <div class="form-group col-md-4">
                <label>Disciplina Base*</label>
                <select name="disciplina_base_id" class="form-control select2bs4" required>
                    <option value=""></option>
                    @foreach($bases as $id => $nome)
                        <option value="{{ $id }}" {{ old('disciplina_base_id', $disciplina->disciplina_base_id ?? '') == $id ? 'selected' : '' }}>{{ $nome }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-md-6">
                <label>Descrição*</label>
                <input type="text" name="descricao" class="form-control" required
                    value="{{ old('descricao', $disciplina->descricao ?? '') }}">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-3">
                <label>Nome Reduzido</label>
                <input type="text" name="nome_reduzido" class="form-control"
                    value="{{ old('nome_reduzido', $disciplina->nome_reduzido ?? '') }}">
            </div>
            <div class="form-group col-md-2">
                <label>Modalidade</label>
                <select name="modalidade" class="form-control select2bs4">
                    @foreach(['Presencial', 'EaD'] as $opt)
                        <option value="{{ $opt }}" {{ old('modalidade', $disciplina->modalidade ?? '') == $opt ? 'selected' : '' }}>{{ $opt }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-md-3">
                <label>Professor Padrão</label>
                <select name="professor_id" class="form-control select2bs4">
                    <option value=""></option>
                    @foreach($professores as $id => $nome)
                        <option value="{{ $id }}" {{ old('professor_id', $disciplina->professor_id ?? '') == $id ? 'selected' : '' }}>{{ $nome }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-md-2">
                <label>Código MEC</label>
                <input type="text" name="codigo_mec" class="form-control"
                    value="{{ old('codigo_mec', $disciplina->codigo_mec ?? '') }}">
            </div>
            <div class="form-group col-md-2">
                <label>Código INEP</label>
                <input type="text" name="codigo_inep" class="form-control"
                    value="{{ old('codigo_inep', $disciplina->codigo_inep ?? '') }}">
            </div>
        </div>
    </div>
</div>

<div class="card card-info">
    <div class="card-header">
        <h3 class="card-title">Configurações de Avaliação</h3>
    </div>
    <div class="card-body">
        <div class="form-row">
            <div class="form-group col-md-3">
                <label>Etapa Período*</label>
                <select name="etapa_periodo_letivo_id" class="form-control select2bs4" required>
                    <option value=""></option>
                    @foreach($etapas as $id => $desc)
                        <option value="{{ $id }}" {{ old('etapa_periodo_letivo_id', $disciplina->etapa_periodo_letivo_id ?? '') == $id ? 'selected' : '' }}>{{ $desc }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-md-3">
                <label>Módulo*</label>
                <select name="id_modulo" class="form-control select2bs4" required>
                    <option value=""></option>
                    @foreach($modulos as $id => $desc)
                        <option value="{{ $id }}" {{ old('id_modulo', $disciplina->id_modulo ?? '') == $id ? 'selected' : '' }}>{{ $desc }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-md-3">
                <label>Área de Conhecimento</label>
                <select name="area_conhecimento_id" class="form-control select2bs4">
                    <option value=""></option>
                    @foreach($areas as $id => $nome)
                        <option value="{{ $id }}" {{ old('area_conhecimento_id', $disciplina->area_conhecimento_id ?? '') == $id ? 'selected' : '' }}>{{ $nome }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-md-3">
                <label>Avaliação</label>
                <select name="avaliacao" class="form-control select2bs4">
                    @foreach(['Por Nota', 'Conceito'] as $opt)
                        <option value="{{ $opt }}" {{ old('avaliacao', $disciplina->avaliacao ?? '') == $opt ? 'selected' : '' }}>{{ $opt }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-3">
                <label>Obrigatoriedade</label>
                <select name="obrigatoriedade" class="form-control select2bs4">
                    @foreach(['Obrigatória', 'Optativa'] as $o)
                        <option value="{{ $o }}" {{ old('obrigatoriedade', $disciplina->obrigatoriedade ?? '') == $o ? 'selected' : '' }}>{{ $o }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-md-3">
                <label>Complementaridade</label>
                <select name="complementaridade" class="form-control select2bs4">
                    @foreach(['Não Informado', 'Sim', 'Não'] as $c)
                        <option value="{{ $c }}" {{ old('complementaridade', $disciplina->complementaridade ?? '') == $c ? 'selected' : '' }}>{{ $c }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-md-6 form-check">
                <input type="checkbox" name="disciplina_tcc" class="form-check-input" {{ old('disciplina_tcc', $disciplina->disciplina_tcc ?? false) ? 'checked' : '' }}>
                <label class="form-check-label">Disciplina TCC</label>
            </div>
        </div>
    </div>
</div>

<div class="card card-warning p-2">
    <div class="card-header">
        <h3 class="card-title">Opções</h3>
    </div>
    <div class="card-body">
        <div class="form-row">
            @php
                $opts = [
                    'nao_apresenta_nota_historico' => 'Não apresentar nota no histórico',
                    'reprova_por_frequencia' => 'Reprovar apenas por frequência',
                    'nao_apresenta_frequencia_historico' => 'Não apresentar frequência no histórico',
                    'nao_contabilizar_ranking' => 'Não contabilizar no ranking de notas',
                    'nao_enviar_educacenso' => 'Não enviar para o Educacenso',
                ];
              @endphp
            @foreach($opts as $field => $label)
                <div class="form-group col-md-4 form-check">
                    <input type="checkbox" name="{{ $field }}" class="form-check-input" {{ old($field, $disciplina->$field ?? false) ? 'checked' : '' }}>
                    <label class="form-check-label">{{ $label }}</label>
                </div>
            @endforeach
        </div>
    </div>
</div>

<div class="card card-light p-2">
    <div class="card-header">
        <h3 class="card-title">Rematrícula</h3>
    </div>
    <div class="card-body">
        <div class="form-row">
            <div class="form-group col-md-4 form-check">
                <input type="checkbox" name="nao_valida_conflito" class="form-check-input" {{ old('nao_valida_conflito', $disciplina->nao_valida_conflito ?? false) ? 'checked' : '' }}>
                <label class="form-check-label">Não validar conflito de horários na rematrícula</label>
            </div>
            <div class="form-group col-md-4 form-check">
                <input type="checkbox" name="nao_conta_minimo" class="form-check-input" {{ old('nao_conta_minimo', $disciplina->nao_conta_minimo ?? false) ? 'checked' : '' }}>
                <label class="form-check-label">Não utilizar na contagem do mínimo de disciplinas para ingressar no
                    módulo</label>
            </div>
            <div class="form-group col-md-4">
                <label>Ter cursado (% do curso)</label>
                <input type="number" name="pct_cursado" step="0.01" class="form-control"
                    value="{{ old('pct_cursado', $disciplina->pct_cursado ?? '') }}">
            </div>
        </div>
    </div>
</div>


@if(!str_contains(Route::current()->getName(), 'show'))
    <div class="card-footer text-right">
        <a href="{{ route('disciplinas.index') }}" class="btn btn-default">Voltar</a>
        <button type="submit" class="btn btn-success">Salvar</button>
    </div>
@endif