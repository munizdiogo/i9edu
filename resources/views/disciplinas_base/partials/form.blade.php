<div class="card card-primary">
  <div class="card-header"><h3 class="card-title">Dados Gerais</h3></div>
  <div class="card-body">
    <div class="form-row">
      <div class="form-group col-md-2">
        <label>Código*</label>
        <input type="text" name="codigo" class="form-control"
               required value="{{ old('codigo',$disciplinas_base->codigo??'') }}">
      </div>
      <div class="form-group col-md-2">
        <label>Status</label>
        <select name="status" class="form-control select2bs4">
          <option value="Ativo"    {{ old('status',$disciplinas_base->status??'')=='Ativo'?'selected':'' }}>Ativo</option>
          <option value="Inativo"  {{ old('status',$disciplinas_base->status??'')=='Inativo'?'selected':'' }}>Inativo</option>
        </select>
      </div>
      <div class="form-group col-md-4">
        <label>Nome*</label>
        <input type="text" name="nome" class="form-control"
               required value="{{ old('nome',$disciplinas_base->nome??'') }}">
      </div>
      <div class="form-group col-md-4">
        <label>Nome Reduz.</label>
        <input type="text" name="nome_reduzido" class="form-control"
               value="{{ old('nome_reduzido',$disciplinas_base->nome_reduzido??'') }}">
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-4">
        <label>Área de Conhecimento</label>
        <select name="area_conhecimento_id" class="form-control select2bs4">
          <option value=""></option>
          @foreach($areas as $id=>$nome)
            <option value="{{ $id }}" {{ old('area_conhecimento_id',$disciplinas_base->area_conhecimento_id??'')==$id?'selected':'' }}>
              {{ $nome }}
            </option>
          @endforeach
        </select>
      </div>
      <div class="form-group col-md-2 form-check mt-4">
        <input type="checkbox" name="equivalencia_automatica" class="form-check-input"
               {{ old('equivalencia_automatica',$disciplinas_base->equivalencia_automatica??false)?'checked':'' }}>
        <label class="form-check-label">Equivalência Automática</label>
      </div>
    </div>
  </div>
</div>

<div class="card card-info">
  <div class="card-header"><h3 class="card-title">Carga Horária</h3></div>
  <div class="card-body">
    <div class="form-row">
      @foreach(['padrao','cobrada','teorica','corrida','extensao','presencial','ead','pratica'] as $ch)
      <div class="form-group col-md-2">
        <label>CH. {{ ucfirst($ch) }}</label>
        <input type="number" step="0.01" name="ch_{{ $ch }}" class="form-control"
               value="{{ old('ch_'.$ch,$disciplinas_base->{'ch_'.$ch}??0) }}">
      </div>
      @endforeach
      <div class="form-group col-md-2">
        <label>Créditos</label>
        <input type="number" step="0.01" name="creditos" class="form-control"
               value="{{ old('creditos',$disciplinas_base->creditos??0) }}">
      </div>
      <div class="form-group col-md-2">
        <label>Qtde. Aulas</label>
        <input type="number" name="qtd_aulas" class="form-control"
               value="{{ old('qtd_aulas',$disciplinas_base->qtd_aulas??0) }}">
      </div>
    </div>
  </div>
</div>

<div class="card card-warning">
  <div class="card-header"><h3 class="card-title">Avaliação</h3></div>
  <div class="card-body">
    <div class="form-row">
      <div class="form-group col-md-3">
        <label>Avaliação</label>
        <select name="avaliacao" class="form-control select2bs4">
          @foreach(['Por Nota','Conceito'] as $opt)
            <option value="{{ $opt }}" {{ old('avaliacao',$disciplinas_base->avaliacao??'')==$opt?'selected':'' }}>
              {{ $opt }}
            </option>
          @endforeach
        </select>
      </div>
      <div class="form-group col-md-3">
        <label>Tipo</label>
        <input type="text" name="tipo_avaliacao" class="form-control"
               value="{{ old('tipo_avaliacao',$disciplinas_base->tipo_avaliacao??'Disciplina') }}">
      </div>
      <div class="form-group col-md-3">
        <label>Obrigatoriedade</label>
        <select name="obrigatoriedade" class="form-control select2bs4">
          @foreach(['Obrigatória','Optativa'] as $o)
            <option value="{{ $o }}" {{ old('obrigatoriedade',$disciplinas_base->obrigatoriedade??'')==$o?'selected':'' }}>
              {{ $o }}
            </option>
          @endforeach
        </select>
      </div>
      <div class="form-group col-md-3">
        <label>Complementaridade</label>
        <select name="complementaridade" class="form-control select2bs4">
          @foreach(['Não Informado','Sim','Não'] as $c)
            <option value="{{ $c }}" {{ old('complementaridade',$disciplinas_base->complementaridade??'')==$c?'selected':'' }}>
              {{ $c }}
            </option>
          @endforeach
        </select>
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-4">
        <label>Área Conhecimento (Avaliação)</label>
        <select name="area_avaliacao_id" class="form-control select2bs4">
          <option value=""></option>
          @foreach($areas as $id=>$nome)
            <option value="{{ $id }}" {{ old('area_avaliacao_id',$disciplinas_base->area_avaliacao_id??'')==$id?'selected':'' }}>
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
            <a href="{{ route('disciplinas_base.index') }}" class="btn btn-default">Voltar</a>
            <button type="submit" class="btn btn-success">Salvar</button>
        </div>
    @endif