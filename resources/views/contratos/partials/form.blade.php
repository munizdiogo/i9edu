<div class="mb-3">
    <label for="id_perfil" class="form-label">Aluno *</label>
    <select name="id_perfil" class="form-control" required>
        <option value="">Selecione...</option>
        @foreach($alunos as $aluno)
            <option value="{{ $aluno->id }}" {{ old('id_perfil', $contrato->id_perfil ?? '') == $aluno->id ? 'selected' : '' }}>
                {{ $aluno->nome }}
            </option>
        @endforeach
    </select>
</div>

<div class="mb-3">
    <label for="id_curso" class="form-label">Curso *</label>
    <select name="id_curso" class="form-control" required>
        <option value="">Selecione...</option>
        @foreach($cursos as $curso)
            <option value="{{ $curso->id }}" {{ old('id_curso', $contrato->id_curso ?? '') == $curso->id ? 'selected' : '' }}>
                {{ $curso->nome }}
            </option>
        @endforeach
    </select>
</div>

<div class="mb-3">
    <label for="id_matricula" class="form-label">Matrícula</label>
    <select name="id_matricula" class="form-control">
        <option value="">Selecione...</option>
        @foreach($matriculas as $matricula)
            <option value="{{ $matricula->id }}" {{ old('id_matricula', $contrato->id_matricula ?? '') == $matricula->id ? 'selected' : '' }}>
                {{ $matricula->id }} - {{ $matricula->descricao ?? '' }}
            </option>
        @endforeach
    </select>
</div>

<div class="mb-3">
    <label for="id_turma" class="form-label">Turma</label>
    <select name="id_turma" class="form-control">
        <option value="">Selecione...</option>
        @foreach($turmas as $turma)
            <option value="{{ $turma->id }}" {{ old('id_turma', $contrato->id_turma ?? '') == $turma->id ? 'selected' : '' }}>
                {{ $turma->nome }}
            </option>
        @endforeach
    </select>
</div>

<div class="mb-3">
    <label for="id_periodo_letivo" class="form-label">Período Letivo *</label>
    <select name="id_periodo_letivo" class="form-control" required>
        <option value="">Selecione...</option>
        @foreach($periodosLetivos as $periodo)
            <option value="{{ $periodo->id }}" {{ old('id_periodo_letivo', $contrato->id_periodo_letivo ?? '') == $periodo->id ? 'selected' : '' }}>
                {{ $periodo->descricao }}
            </option>
        @endforeach
    </select>
</div>

<div class="mb-3">
    <label for="id_plano_pagamento" class="form-label">Plano de Pagamento *</label>
    <select name="id_plano_pagamento" class="form-control" required>
        <option value="">Selecione...</option>
        @foreach($planos as $plano)
            <option value="{{ $plano->id }}" {{ old('id_plano_pagamento', $contrato->id_plano_pagamento ?? '') == $plano->id ? 'selected' : '' }}>
                {{ $plano->nome }}
            </option>
        @endforeach
    </select>
</div>

<div class="mb-3">
    <label for="status" class="form-label">Status *</label>
    <select name="status" class="form-control" required>
        @foreach(['PENDENTE', 'ACEITO', 'CANCELADO'] as $status)
            <option value="{{ $status }}" {{ old('status', $contrato->status ?? '') == $status ? 'selected' : '' }}>
                {{ $status }}
            </option>
        @endforeach
    </select>
</div>

<div class="row">
    <div class="mb-3 col-md-4">
        <label for="data_aceite" class="form-label">Data Aceite</label>
        <input type="date" name="data_aceite" value="{{ old('data_aceite', $contrato->data_aceite ?? '') }}"
            class="form-control">
    </div>
    <div class="mb-3 col-md-4">
        <label for="data_inicio_vigencia" class="form-label">Início Vigência</label>
        <input type="date" name="data_inicio_vigencia"
            value="{{ old('data_inicio_vigencia', $contrato->data_inicio_vigencia ?? '') }}" class="form-control">
    </div>
    <div class="mb-3 col-md-4">
        <label for="data_fim_vigencia" class="form-label">Fim Vigência</label>
        <input type="date" name="data_fim_vigencia"
            value="{{ old('data_fim_vigencia', $contrato->data_fim_vigencia ?? '') }}" class="form-control">
    </div>
</div>

<div class="mb-3">
    <label for="cancelado_por" class="form-label">Cancelado por</label>
    <input type="text" name="cancelado_por" value="{{ old('cancelado_por', $contrato->cancelado_por ?? '') }}"
        class="form-control">
</div>

<div class="mb-3">
    <label for="observacao" class="form-label">Observação</label>
    <textarea name="observacao" class="form-control"
        rows="2">
        {{ old('observacao', $contrato->observacao ?? '') }}
    </textarea>
</div>


@if(!str_contains(Route::current()->getName(), 'show'))
    <div class="card-footer text-right">
        <a href="{{ route('contratos.index') }}" class="btn btn-default">Voltar</a>
        <button type="submit" class="btn btn-success">Salvar</button>
    </div>
@endif