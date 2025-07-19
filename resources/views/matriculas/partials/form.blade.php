<div class="card card-primary">
  <div class="card-header">
    <h3 class="card-title">Dados da Matrícula</h3>
  </div>
  <div class="card-body">
    <div class="form-row">
      <div class="form-group col-md-4">
        <label>Admissão*</label>
        <select name="aluno_curso_admissao_id"
                class="form-control select2bs4" required>
          <option value="">— selecione —</option>
          @foreach($admissoes as $id => $nome)
            <option value="{{ $id }}"
              {{ old('aluno_curso_admissao_id',$matricula->aluno_curso_admissao_id??'')==$id?'selected':'' }}>
              {{ $nome }}
            </option>
          @endforeach
        </select>
      </div>
      <div class="form-group col-md-4">
        <label>Turma*</label>
        <select name="turma_id" class="form-control select2bs4" required>
          <option value="">— selecione —</option>
          @foreach($turmas as $id => $nome)
            <option value="{{ $id }}"
              {{ old('turma_id',$matricula->turma_id??'')==$id?'selected':'' }}>
              {{ $nome }}
            </option>
          @endforeach
        </select>
      </div>
      <div class="form-group col-md-4">
        <label>Contrato</label>
        <input type="text" name="contrato_id" class="form-control"
               value="{{ old('contrato_id',$matricula->contrato_id??'') }}">
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-3">
        <label>Data Matrícula*</label>
        <input type="date" name="data_matricula" class="form-control"
               value="{{ old('data_matricula',$matricula->data_matricula??'') }}"
               required>
      </div>
      <div class="form-group col-md-3">
        <label>Data Ocorrência</label>
        <input type="date" name="data_ocorrencia" class="form-control"
               value="{{ old('data_ocorrencia',$matricula->data_ocorrencia??'') }}">
      </div>
      <div class="form-group col-md-3">
        <label>Status*</label>
        <select name="status" class="form-control select2bs4" required>
          @foreach([
            'ATIVA','AGUARDANDO','APROVADO','APROVADO_PARCIALMENTE',
            'CANCELADA','DESISTENTE','INFREQUENTE','REENQUADRADA'
          ] as $st)
            <option value="{{ $st }}"
              {{ old('status',$matricula->status??'')==$st?'selected':'' }}>
              {{ $st }}
            </option>
          @endforeach
        </select>
      </div>
    </div>
  </div>
</div>


@if(!str_contains(Route::current()->getName(), 'show'))
    <div class="card-footer text-right">
        <a href="{{ route('matriculas.index') }}" class="btn btn-default">Voltar</a>
        <button type="submit" class="btn btn-success">Salvar</button>
    </div>
@endif