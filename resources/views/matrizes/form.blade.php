{{-- Partial form fields --}}
<div class="card card-primary">
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
            <div class="form-group col-md-4"><label>Curso*</label><select name="curso_id" class="form-control">
                    <option value="">-- selecione --</option>@foreach($cursos as $c)<option value="{{$c->id}}"
                        {{old('curso_id', $matriz->curso_id ?? '') == $c->id ? 'selected' : ''}}>{{$c->nome_impressao1}}
                    </option>@endforeach
                </select></div>
            <div class="form-group col-md-4"><label>Centro de Custo</label><select name="centro_custo_id"
                    class="form-control">
                    <option value="">-- selecione --</option>@foreach($polos as $p)<option value="{{$p->id}}"
                        {{old('centro_custo_id', $matriz->centro_custo_id ?? '') == $p->id ? 'selected' : ''}}>
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
                    <option value="Presencial" {{old('modalidade', $matriz->modalidade ?? '') == 'Presencial' ? 'selected' : ''}}>Presencial</option>
                    <option value="EaD" {{old('modalidade', $matriz->modalidade ?? '') == 'EaD' ? 'selected' : ''}}>EaD
                    </option>
                    <option value="Híbrido" {{old('modalidade', $matriz->modalidade ?? '') == 'Híbrido' ? 'selected' : ''}}>
                        Híbrido</option>
                </select></div>
            <div class="form-group col-md-3"><label>ID INEP</label><input type="text" name="inep_id"
                    value="{{ old('inep_id', $matriz->inep_id ?? '') }}" class="form-control"></div>
        </div>
        <div class="form-group"><label>Data do Currículo</label><input type="date" name="data_curriculo"
                value="{{ old('data_curriculo', $matriz->data_curriculo ?? '') }}" class="form-control"></div>
    </div>
</div>

<div class="row mt-3">
    <div class="col text-right"><a href="{{ route('matrizes.index') }}" class="btn btn-default">Voltar</a><button
            type="submit" class="btn btn-primary">Salvar</button></div>
</div>