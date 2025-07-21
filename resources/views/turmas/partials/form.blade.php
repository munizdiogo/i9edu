@php
    $turnos = ['Manhã', 'Tarde', 'Noite', 'EaD', 'Integral'];
@endphp

<div class="card card-primary p-2">
    <div class="card-header">
        <h3 class="card-title">Principal</h3>
    </div>
    <div class="card-body">
        <div class="form-row">
            <div class="form-group col-md-2"><label>Código</label><input readonly class="form-control"
                    value="{{ $turma->id ?? '---' }}"></div>
            <div class="form-group col-md-4"><label>Nome*</label><input type="text" name="nome" class="form-control"
                    value="{{ old('nome', $turma->nome ?? '') }}" required></div>
            <div class="form-group col-md=6"><label>Identificador</label><input type="text" name="identificador"
                    class="form-control" value="{{ old('identificador', $turma->identificador ?? '') }}"></div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-4"><label>Matriz*</label>
                <select name="id_matriz_curricular" class="form-control select2bs4"
                    required>@foreach($matrizes as $matriz)<option value="{{$matriz->id}}" {{old('id_matriz_curricular', $turma->id_matriz_curricular ?? '') == $matriz->id ? 'selected' : ''}}>
                        {{$matriz->nome}}
                    </option>@endforeach</select>
            </div>
            <div class="form-group col-md-4"><label>Período Letivo*</label>
                <select name="periodo_letivo_id" class="form-control select2bs4" required>@foreach($periodos as $p)
                    <option value="{{$p->id}}" {{old('periodo_letivo_id', $turma->periodo_letivo_id ?? '') == $p->id ? 'selected' : ''}}>
                        {{$p->nome}}
                </option>@endforeach
                </select>
            </div>
            <div class="form-group col-md-4"><label>Turma Base</label><select name="turma_base_id" class="form-control">
                    <option value="">--</option>@foreach($turmasBase ?? [] as $tb)<option value="{{$tb->id}}"
                        {{old('turma_base_id', $turma->turma_base_id ?? '') == $tb->id ? 'selected' : ''}}>{{$tb->nome}}
                    </option>@endforeach
                </select></div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-4"><label>Centro de Custo</label>
                <select name="centro_custo_id" class="form-control select2bs4">
                    <option value="">--</option>@foreach($polos as $p)<option value="{{$p->id}}"
                        {{old('centro_custo_id', $turma->centro_custo_id ?? '') == $p->id ? 'selected' : ''}}>{{$p->nome}}
                    </option>@endforeach
                </select>
            </div>
            <div class="form-group col-md-4"><label>Professor Resp.</label><select name="professor_responsavel_id"
                    class="form-control">
                    <option value="">--</option>@foreach($professores as $pr)<option value="{{$pr->id}}"
                    {{old('professor_responsavel_id', $turma->professor_responsavel_id ?? '') == $pr->id ? 'selected' : ''}}>{{$pr->nome}} {{$pr->sobrenome}}</option>@endforeach
                </select></div>
            <div class="form-group col-md-4"><label>Status</label><select name="status" class="form-control">
                    <option value="ATIVA" {{old('status', $turma->status ?? '') == 'ATIVA' ? 'selected' : ''}}>ATIVA
                    </option>
                    <option value="INATIVA" {{old('status', $turma->status ?? '') == 'INATIVA' ? 'selected' : ''}}>INATIVA
                    </option>
                </select></div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-3"><label>Turno</label><select name="turno"
                    class="form-control">@foreach($turnos as $t)<option value="{{$t}}" {{old('turno', $turma->turno ?? '') == $t ? 'selected' : ''}}>{{$t}}</option>@endforeach</select></div>
            <div class="form-group col-md-9"><label>Parecer Descrição</label><input type="text" name="parecer_descricao"
                    class="form-control" value="{{ old('parecer_descricao', $turma->parecer_descricao ?? '') }}"></div>
        </div>
        <div class="form-group"><label>Descrição</label><input type="text" name="descricao" class="form-control"
                value="{{ old('descricao', $turma->descricao ?? '') }}"></div>
    </div>
</div>

<div class="card card-dark p-2">
    <div class="card-header">
        <h3 class="card-title">Configuração de Notas</h3>
    </div>
    <div class="card-body">
        <div class="form-row">
            <div class="form-group col-md-2"><label>Média Período</label><input type="number" step="0.01"
                    name="media_periodo" class="form-control"
                    value="{{ old('media_periodo', $turma->media_periodo ?? 5) }}"></div>
            <div class="form-group col-md-2"><label>Média Mínima</label><input type="number" step="0.01"
                    name="media_minima" class="form-control"
                    value="{{ old('media_minima', $turma->media_minima ?? 5) }}"></div>
            <div class="form-group col-md-2"><label>Frequência (%)</label><input type="number" name="freq_periodo"
                    class="form-control" value="{{ old('freq_periodo', $turma->freq_periodo ?? 75) }}"></div>
            <div class="form-group col-md-2"><label>Média Rec.</label><input type="number" step="0.01"
                    name="media_recuperacao" class="form-control"
                    value="{{ old('media_recuperacao', $turma->media_recuperacao ?? 5) }}"></div>
            <div class="form-group col-md-2"><label>Média Min. Rec.</label><input type="number" step="0.01"
                    name="media_minima_rec" class="form-control"
                    value="{{ old('media_minima_rec', $turma->media_minima_rec ?? 5) }}"></div>
            <div class="form-group col-md-2"><label>Nota Mínima</label><input type="number" step="0.01"
                    name="nota_minima" class="form-control" value="{{ old('nota_minima', $turma->nota_minima ?? 0) }}">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-2"><label>Nota Máxima</label><input type="number" step="0.01"
                    name="nota_maxima" class="form-control" value="{{ old('nota_maxima', $turma->nota_maxima ?? 10) }}">
            </div>
            <div class="form-group col-md-2 form-check"><label class="form-check-label"><input type="checkbox"
                        name="ne_nota_exame" class="form-check-input" {{ old('ne_nota_exame', $turma->ne_nota_exame ?? false) ? 'checked' : '' }}> NE - Nota Exame</label></div>
            <div class="form-group col-md-2 form-check"><label class="form-check-label"><input type="checkbox"
                        name="nf_nota_final" class="form-check-input" {{ old('nf_nota_final', $turma->nf_nota_final ?? false) ? 'checked' : '' }}> NF - Nota Final</label></div>
        </div>
    </div>
</div>

<div class="card card-dark p-2">
    <div class="card-header">
        <h3 class="card-title">Info. Complementares</h3>
    </div>
    <div class="card-body">
        <div class="form-row">
            <div class="form-group col-md-3"><label>Cidade</label><input type="text" name="cidade" class="form-control"
                    value="{{ old('cidade', $turma->cidade ?? '') }}"></div>
            <div class="form-group col-md-3"><label>Data Início</label><input type="date" name="data_inicio"
                    class="form-control" value="{{ old('data_inicio', $turma->data_inicio ?? '') }}"></div>
            <div class="form-group col-md=3"><label>Data Término</label><input type="date" name="data_termino"
                    class="form-control" value="{{ old('data_termino', $turma->data_termino ?? '') }}"></div>
            <div class="form-group col-md-3"><label>Formato Venda</label><input type="text" name="formato_venda"
                    class="form-control" value="{{ old('formato_venda', $turma->formato_venda ?? '') }}"></div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-3"><label>ID Inep</label><input type="text" name="inep_id"
                    class="form-control" value="{{ old('inep_id', $turma->inep_id ?? '') }}"></div>
            <div class="form-group col-md-3"><label>Seguro Escolar</label><input type="text" name="seguro_escolar"
                    class="form-control" value="{{ old('seguro_escolar', $turma->seguro_escolar ?? '') }}"></div>
            <div class="form-group col-md-3 form-check"><label class="form-check-label"><input type="checkbox"
                        name="nucleo_comum" class="form-check-input" {{ old('nucleo_comum', $turma->nucleo_comum ?? false) ? 'checked' : '' }}> Núcleo Comum</label></div>
            <div class="form-group col-md-3 form-check"><label class="form-check-label"><input type="checkbox"
                        name="acesso_biblioteca" class="form-check-input" {{ old('acesso_biblioteca', $turma->acesso_biblioteca ?? false) ? 'checked' : '' }}> Acesso
                    Biblioteca</label></div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-3 form-check"><label class="form-check-label"><input type="checkbox"
                        name="acesso_blackboard" class="form-check-input" {{ old('acesso_blackboard', $turma->acesso_blackboard ?? false) ? 'checked' : '' }}> Acesso
                    Blackboard</label></div>
            <div class="form-group col-md-3 form-check"><label class="form-check-label"><input type="checkbox"
                        name="atendimento_online" class="form-check-input" {{ old('atendimento_online', $turma->atendimento_online ?? false) ? 'checked' : '' }}> Atendimento
                    Online</label></div>
            <div class="form-group col-md-6"><label>Observações</label><textarea name="observacoes" class="form-control"
                    rows="2">{{ old('observacoes', $turma->observacoes ?? '') }}</textarea></div>
        </div>
    </div>
</div>


@if(!str_contains(Route::current()->getName(), 'show'))
    <div class="card-footer text-right">
        <a href="{{ route('turmas.index') }}" class="btn btn-default">Voltar</a>
        <button type="submit" class="btn btn-success">Salvar</button>
    </div>
@endif