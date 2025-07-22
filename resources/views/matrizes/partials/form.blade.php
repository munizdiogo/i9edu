{{-- Partial form fields --}}
<div class="card card-primary p-2">
  <div class="card-header">
    <h3 class="card-title">Dados da Matriz Curricular</h3>
  </div>
  <div class="card-body">
    <div class="row">
      <div class="form-group col-md-6"><label>Nome*</label><input type="text" name="nome"
          value="{{ old('nome', $matriz->nome ?? '') }}" class="form-control" required></div>
      <div class="form-group col-md-6"><label>Nome Reduzido</label><input type="text" name="nome_reduzido"
          value="{{ old('nome_reduzido', $matriz->nome_reduzido ?? '') }}" class="form-control"></div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-4"><label>Curso*</label>
        <select name="id_curso" class="form-control select2bs4">
          <option value="">-- selecione --</option>@foreach($cursos as $c)<option value="{{$c->id}}" {{old('id_curso', $matriz->id_curso ?? '') == $c->id ? 'selected' : ''}}>{{$c->nome_impressao1}}
      </option>@endforeach
        </select>
      </div>
      <div class="form-group col-md-4"><label>Centro de Custo</label><select name="id_centro_custo"
          class="form-control">
          <option value="">-- selecione --</option>@foreach($polos as $p)<option value="{{$p->id}}"
      {{old('id_centro_custo', $matriz->id_centro_custo ?? '') == $p->id ? 'selected' : ''}}>
      {{$p->nome}}
      </option>@endforeach
        </select></div>
      <div class="form-group col-md-4"><label>Habilitação/Ênfase</label><input type="text" name="habilitacao"
          value="{{ old('habilitacao', $matriz->habilitacao ?? '') }}" class="form-control"></div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-3"><label>Data Habilitação</label><input type="date" name="data_habilitacao"
          value="{{ old('data_habilitacao', $matriz->data_habilitacao ?? '') }}" class="form-control"></div>
      <div class="form-group col-md-3"><label>Status</label><select name="status" class="form-control">
          <option value="ATIVO" {{old('status', $matriz->status ?? '') == 'ATIVO' ? 'selected' : ''}}>ATIVO
          </option>
          <option value="INATIVO" {{old('status', $matriz->status ?? '') == 'INATIVO' ? 'selected' : ''}}>
            INATIVO
          </option>
        </select></div>
      <div class="form-group col-md=3"><label>Modalidade</label><select name="modalidade" class="form-control">
          <option value="Presencial" {{old('modalidade', $matriz->modalidade ?? '') == 'Presencial' ? 'selected' : ''}}>
            Presencial</option>
          <option value="EaD" {{old('modalidade', $matriz->modalidade ?? '') == 'EaD' ? 'selected' : ''}}>EaD
          </option>
          <option value="Híbrido" {{old('modalidade', $matriz->modalidade ?? '') == 'Híbrido' ? 'selected' : ''}}>
            Híbrido</option>
        </select></div>
      <div class="form-group col-md-3"><label>ID INEP</label><input type="text" name="id_inep"
          value="{{ old('id_inep', $matriz->id_inep ?? '') }}" class="form-control"></div>
    </div>
    <div class="form-group"><label>Data do Currículo</label><input type="date" name="data_curriculo"
        value="{{ old('data_curriculo', $matriz->data_curriculo ?? '') }}" class="form-control"></div>
  </div>
</div>

{{-- Configuração de Horas --}}
<div class="card card-info p-2">
  <div class="card-header">
    <h3 class="card-title">Configuração de Horas</h3>
  </div>
  <div class="card-body">
    <div class="form-row">
      <div class="form-group col-md-3">
        <label>Tipo Horas Atividades</label>
        <input type="number" name="tipo_horas_atividades" class="form-control"
          value="{{ old('tipo_horas_atividades', $matriz->tipo_horas_atividades ?? 0) }}">
      </div>
      <div class="form-group col-md-3">
        <label>Min. Hr. Aula</label>
        <input type="number" name="min_hr_aula" class="form-control"
          value="{{ old('min_hr_aula', $matriz->min_hr_aula ?? 0) }}">
      </div>
      <div class="form-group col-md-3">
        <label>Créditos</label>
        <input type="number" step="0.01" name="creditos" class="form-control"
          value="{{ old('creditos', $matriz->creditos ?? 0) }}">
      </div>
      <div class="form-group col-md-3">
        <label>Carga Horária</label>
        <input type="number" name="carga_horaria" class="form-control"
          value="{{ old('carga_horaria', $matriz->carga_horaria ?? 0) }}">
      </div>
    </div>
    <div class="form-row">
      @foreach(['ch_teorica', 'ch_presencial', 'ch_ativ_exigidas', 'ch_ativ_extensao', 'ch_itinerario', 'ch_tcc', 'ch_estagio', 'ch_pratica', 'ch_ead'] as $field)
      <div class="form-group col-md-2">
      <label>{{ strtoupper(str_replace('_', ' ', $field)) }}</label>
      <input type="number" name="{{ $field }}" class="form-control" value="{{ old($field, $matriz->$field ?? 0) }}">
      </div>
    @endforeach
    </div>
  </div>
</div>

{{-- Configuração de Notas --}}
<div class="card card-warning p-2">
  <div class="card-header">
    <h3 class="card-title">Configuração de Notas</h3>
  </div>
  <div class="card-body">
    <div class="form-row">
      <div class="form-group col-md-2">
        <label>Média Período</label>
        <input type="number" step="0.01" name="media_periodo" class="form-control"
          value="{{ old('media_periodo', $matriz->media_periodo ?? 5) }}">
      </div>
      <div class="form-group col-md-2">
        <label>Média Mínima</label>
        <input type="number" step="0.01" name="media_minima" class="form-control"
          value="{{ old('media_minima', $matriz->media_minima ?? 5) }}">
      </div>
      <div class="form-group col-md-2">
        <label>Frequência (%)</label>
        <input type="number" name="freq_periodo" class="form-control"
          value="{{ old('freq_periodo', $matriz->freq_periodo ?? 75) }}">
      </div>
      <div class="form-group col-md-2">
        <label>Média Recuperação</label>
        <input type="number" step="0.01" name="media_recuperacao" class="form-control"
          value="{{ old('media_recuperacao', $matriz->media_recuperacao ?? 5) }}">
      </div>
      <div class="form-group col-md-2">
        <label>Média Mínima Rec.</label>
        <input type="number" step="0.01" name="media_minima_rec" class="form-control"
          value="{{ old('media_minima_rec', $matriz->media_minima_rec ?? 5) }}">
      </div>
      <div class="form-group col-md-2">
        <label>Freq. Recuperação</label>
        <input type="text" name="freq_recuperacao" class="form-control"
          value="{{ old('freq_recuperacao', $matriz->freq_recuperacao ?? '') }}">
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-3">
        <label>Nota Mínima</label>
        <input type="number" step="0.01" name="nota_minima" class="form-control"
          value="{{ old('nota_minima', $matriz->nota_minima ?? 0) }}">
      </div>
      <div class="form-group col-md-3">
        <label>Nota Máxima</label>
        <input type="number" step="0.01" name="nota_maxima" class="form-control"
          value="{{ old('nota_maxima', $matriz->nota_maxima ?? 10) }}">
      </div>
    </div>
  </div>
</div>

{{-- Configuração de Prazo --}}
<div class="card card-success p-2">
  <div class="card-header">
    <h3 class="card-title">Configuração de Prazo</h3>
  </div>
  <div class="card-body">
    <div class="form-row">
      <div class="form-group col-md-3">
        <label>Prazo em</label>
        <select name="prazo_em" class="form-control">
          <option value="Anos" {{ old('prazo_em', $matriz->prazo_em ?? '') == 'Anos' ? 'selected' : '' }}>Anos</option>
          <option value="Semestres" {{ old('prazo_em', $matriz->prazo_em ?? '') == 'Semestres' ? 'selected' : '' }}>
            Semestres
          </option>
        </select>
      </div>
      <div class="form-group col-md-3">
        <label>Prazo Inicial</label>
        <input type="number" name="prazo_inicial" class="form-control"
          value="{{ old('prazo_inicial', $matriz->prazo_inicial ?? 8) }}">
      </div>
      <div class="form-group col-md-3">
        <label>Prazo Máximo</label>
        <input type="number" name="prazo_maximo" class="form-control"
          value="{{ old('prazo_maximo', $matriz->prazo_maximo ?? 14) }}">
      </div>
      <div class="form-group col-md-3">
        <label>Periodicidade</label>
        <input type="text" name="periodicidade" class="form-control"
          value="{{ old('periodicidade', $matriz->periodicidade ?? 'Semestral') }}">
      </div>
    </div>
    <div class="custom-control custom-checkbox">
      <input type="checkbox" id="possivel_trancar_1periodo" name="possivel_trancar_1periodo"
        class="custom-control-input" {{ old('possivel_trancar_1periodo', $matriz->possivel_trancar_1periodo ?? false) ? 'checked' : '' }}>
      <label for="possivel_trancar_1periodo" class="custom-control-label">Possível trancar no 1º Período</label>
    </div>
  </div>
</div>


@if(!str_contains(Route::current()->getName(), 'show'))
  <div class="card-footer text-right">
    <a href="{{ route('matrizes.index') }}" class="btn btn-default">Voltar</a>
    <button type="submit" class="btn btn-success">Salvar</button>
  </div>
@endif