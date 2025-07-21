@php
    $turnos = ['Matutino', 'Vespertino', 'Noturno', 'Integral', 'EaD'];
@endphp

<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Dados do Curso</h3>
    </div>
    <div class="card-body">
        <div class="form-row">
            <div class="form-group col-md-4">
                <label>Aluno*</label>
                <select name="id_aluno" class="form-control select2bs4" required>
                    <option value="">— selecione —</option>
                    @foreach($alunos as $id => $nome)
                        <option value="{{ $id }}" {{ old('id_aluno', $admissao->id_aluno ?? '') == $id ? 'selected' : '' }}>
                            {{ $nome }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-md-4">
                <label>Matriz*</label>
                <select name="id_matriz_curricular" class="form-control select2bs4" required>
                    <option value="">— selecione —</option>
                    @foreach($matrizes as $id => $nome)
                        <option value="{{ $id }}" {{ old('id_matriz_curricular', $admissao->id_matriz_curricular ?? '') == $id ? 'selected' : '' }}>
                            {{ $nome }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-md-2">
                <label>Data Ingresso*</label>
                <input type="date" name="data_ingresso" class="form-control"
                    value="{{ old('data_ingresso', $admissao->data_ingresso ?? '') }}" required>
            </div>
            <div class="form-group col-md-2">
                <label>Turno*</label>
                <select name="turno" class="form-control select2bs4" required>
                    <option value="">—</option>
                    @foreach($turnos as $t)
                        <option value="{{ $t }}" {{ old('turno', $admissao->turno ?? '') == $t ? 'selected' : '' }}>
                            {{ $t }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-3">
                <label>Data Início do Curso</label>
                <input type="date" name="data_inicio_curso" class="form-control"
                    value="{{ old('data_inicio_curso', $admissao->data_inicio_curso ?? '') }}">
            </div>
            <div class="form-group col-md-3">
                <label>Data Conclusão</label>
                <input type="date" name="data_conclusao" class="form-control"
                    value="{{ old('data_conclusao', $admissao->data_conclusao ?? '') }}">
            </div>
            <div class="form-group col-md-3">
                <label>Período Conclusão</label>
                <input type="text" name="periodo_conclusao" class="form-control"
                    value="{{ old('periodo_conclusao', $admissao->periodo_conclusao ?? '') }}">
            </div>
            <div class="form-group col-md-3">
                <label>Número Matrícula</label>
                <input type="text" name="numero_matricula" class="form-control"
                    value="{{ old('numero_matricula', $admissao->numero_matricula ?? '') }}">
            </div>
        </div>
    </div>
</div>

<div class="card card-info">
    <div class="card-header">
        <h3 class="card-title">Processo Seletivo</h3>
    </div>
    <div class="card-body">
        <div class="form-row">
            <div class="form-group col-md-4">
                <label>Edital Vestibular</label>
                <select name="edital_processo_seletivo_id" class="form-control select2bs4">
                    <option value="">— selecione —</option>
                    @foreach($editais as $id => $descricao)
                        <option value="{{ $id }}" {{ old('edital_processo_seletivo_id', $admissao->edital_processo_seletivo_id ?? '') == $id ? 'selected' : '' }}>
                            {{ $descricao }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-md-4">
                <label>Data Vestibular</label>
                <input type="date" name="data_vestibular" class="form-control"
                    value="{{ old('data_vestibular', $admissao->data_vestibular ?? '') }}">
            </div>
            <div class="form-group col-md-4">
                <label>Nota Redação</label>
                <input type="number" step="0.01" name="nota_redacao" class="form-control"
                    value="{{ old('nota_redacao', $admissao->nota_redacao ?? '') }}">
            </div>
        </div>
        {{-- ... demais campos de classificação, pontos, vagas, etc --}}
    </div>
</div>

<div class="card card-warning">
    <div class="card-header">
        <h3 class="card-title">Estágio / Transferência</h3>
    </div>
    <div class="card-body">
        <div class="form-row">
            <div class="form-group col-md-3">
                <label>Data Estágio</label>
                <input type="date" name="data_estagio" class="form-control"
                    value="{{ old('data_estagio', $admissao->data_estagio ?? '') }}">
            </div>
            <div class="form-group col-md-3">
                <label>Horas Estágio</label>
                <input type="number" name="horas_estagio" class="form-control"
                    value="{{ old('horas_estagio', $admissao->horas_estagio ?? '') }}">
            </div>
            <div class="form-group col-md-6">
                <label>Instituição Transferência</label>
                <select name="instituicao_transferencia_id" class="form-control select2bs4">
                    <option value="">— selecione —</option>
                    @foreach($instituicoes as $id => $nome)
                        <option value="{{ $id }}" {{ old('instituicao_transferencia_id', $admissao->instituicao_transferencia_id ?? '') == $id ? 'selected' : '' }}>
                            {{ $nome }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
</div>


@if(!str_contains(Route::current()->getName(), 'show'))
    <div class="card-footer text-right">
        <a href="{{ route('admissoes.index') }}" class="btn btn-default">Voltar</a>
        <button type="submit" class="btn btn-success">Salvar</button>
    </div>
@endif