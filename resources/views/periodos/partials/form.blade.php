<div class="card card-primary p-2">
  <div class="card-header"><h3 class="card-title">Dados do Período Letivo</h3></div>
  <div class="card-body">
    <div class="form-row">
      <div class="form-group col-md-6">
        <label>Descrição*</label>
        <input type="text" name="descricao" class="form-control"
               value="{{ old('descricao', $periodo->descricao ?? '') }}" required>
      </div>
      <div class="form-group col-md-6">
        <label>Nome Impressão*</label>
        <input type="text" name="nome_impressao" class="form-control"
               value="{{ old('nome_impressao', $periodo->nome_impressao ?? '') }}" required>
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-3">
        <label>Data Início*</label>
        <input type="date" name="data_inicio" class="form-control"
               value="{{ old('data_inicio', $periodo->data_inicio ?? '') }}" required>
      </div>
      <div class="form-group col-md-3">
        <label>Data Término*</label>
        <input type="date" name="data_termino" class="form-control"
               value="{{ old('data_termino', $periodo->data_termino ?? '') }}" required>
      </div>
      <div class="form-group col-md-2">
        <label>Ano*</label>
        <input type="number" name="ano" class="form-control"
               value="{{ old('ano', $periodo->ano ?? date('Y')) }}" required>
      </div>
      <div class="form-group col-md-2">
        <label>Dias Letivos</label>
        <input type="number" name="dias_letivos" class="form-control"
               value="{{ old('dias_letivos', $periodo->dias_letivos ?? '') }}">
      </div>
      <div class="form-group col-md-2">
        <label>Situação</label>
        <select name="situacao" class="form-control">
          <option value="ABERTO"  {{ old('situacao', $periodo->situacao ?? '')=='ABERTO'  ? 'selected':'' }}>ABERTO</option>
          <option value="FECHADO" {{ old('situacao', $periodo->situacao ?? '')=='FECHADO' ? 'selected':'' }}>FECHADO</option>
        </select>
      </div>
    </div>

    <div class="form-row">
      <div class="form-group col-md-3">
        <label>Tipo</label>
        <input type="text" name="tipo" class="form-control"
               value="{{ old('tipo', $periodo->tipo ?? '') }}">
      </div>
      <div class="form-group col-md-3">
        <label>Semestre</label>
        <select name="semestre" class="form-control">
          <option value="Anual"      {{ old('semestre',$periodo->semestre ?? '')=='Anual'?      'selected':'' }}>Anual</option>
          <option value="Semestral"  {{ old('semestre',$periodo->semestre ?? '')=='Semestral'?  'selected':'' }}>Semestral</option>
        </select>
      </div>
      <div class="form-group col-md-3 form-check mt-4">
        <input type="checkbox" name="periodo_especial" class="form-check-input"
               {{ old('periodo_especial',$periodo->periodo_especial ?? false)? 'checked':'' }}>
        <label class="form-check-label">Período Especial?</label>
      </div>
      <div class="form-group col-md-3 form-check mt-4">
        <input type="checkbox" name="periodo_atual" class="form-check-input"
               {{ old('periodo_atual',$periodo->periodo_atual ?? false)? 'checked':'' }}>
        <label class="form-check-label">Período Atual</label>
      </div>
    </div>
  </div>
</div>


    @if(!str_contains(Route::current()->getName(), 'show'))
        <div class="card-footer text-right">
            <a href="{{ route('periodos.index') }}" class="btn btn-default">Voltar</a>
            <button type="submit" class="btn btn-success">Salvar</button>
        </div>
    @endif