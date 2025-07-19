<div class="card card-primary">
    <div class="card-body">
        <div class="form-row">
            <div class="form-group col-md-2">
                <label>Código*</label>
                <input type="number" name="codigo" class="form-control" required
                    value="{{ old('codigo', $funcionario->codigo ?? '') }}">
            </div>
            <div class="form-group col-md-4">
                <label>Perfil*</label>
                <select name="perfil_id" class="form-control select2bs4" required>
                    <option value=""></option>
                    @foreach($perfis as $id => $nome)
                        <option value="{{ $id }}" {{ old('perfil_id', $funcionario->perfil_id ?? '') == $id ? 'selected' : '' }}>{{ $nome }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-md-3">
                <label>Email Empresa</label>
                <input type="email" name="email_empresa" class="form-control"
                    value="{{ old('email_empresa', $funcionario->email_empresa ?? '') }}">
            </div>
            <div class="form-group col-md-3">
                <label>Status*</label>
                <select name="status" class="form-control select2bs4" required>
                    <option value="Ativo" {{ old('status', $funcionario->status ?? '') == 'Ativo' ? 'selected' : '' }}>
                        Ativo
                    </option>
                    <option value="Inativo" {{ old('status', $funcionario->status ?? '') == 'Inativo' ? 'selected' : '' }}>
                        Inativo</option>
                </select>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-3">
                <label>Data Admissão</label>
                <input type="date" name="data_admissao" class="form-control"
                    value="{{ old('data_admissao', $funcionario->data_admissao ?? '') }}">
            </div>
            <div class="form-group col-md-3">
                <label>Data Demissão</label>
                <input type="date" name="data_demissao" class="form-control"
                    value="{{ old('data_demissao', $funcionario->data_demissao ?? '') }}">
            </div>
            <div class="form-group col-md-3">
                <label>Setor</label>
                <select name="setor_id" class="form-control select2bs4">
                    <option value=""></option>
                    @foreach($setores as $id => $desc)
                        <option value="{{ $id }}" {{ old('setor_id', $funcionario->setor_id ?? '') == $id ? 'selected' : '' }}>
                            {{ $desc }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-md-3">
                <label>Função</label>
                <select name="funcao_id" class="form-control select2bs4">
                    <option value=""></option>
                    @foreach($funcoes as $id => $desc)
                        <option value="{{ $id }}" {{ old('funcao_id', $funcionario->funcao_id ?? '') == $id ? 'selected' : '' }}>
                            {{ $desc }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-2">
                <label>N° Dependentes</label>
                <input type="number" name="nr_dependentes" class="form-control"
                    value="{{ old('nr_dependentes', $funcionario->nr_dependentes ?? 0) }}">
            </div>
            <div class="form-group col-md-3">
                <label>N° Folha</label>
                <input type="text" name="nr_folha" class="form-control"
                    value="{{ old('nr_folha', $funcionario->nr_folha ?? '') }}">
            </div>
            <div class="form-group col-md-2">
                <label>Horas Mês</label>
                <input type="number" name="nr_horas_mes" class="form-control"
                    value="{{ old('nr_horas_mes', $funcionario->nr_horas_mes ?? '') }}">
            </div>
            <div class="form-group col-md-3">
                <label>Tipo Contrato</label>
                <select name="tipo_contrato" class="form-control select2bs4">
                    @foreach(['Não informado', 'CLT', 'PJ', 'Autônomo'] as $opt)
                        <option value="{{ $opt}}" {{ old('tipo_contrato', $funcionario->tipo_contrato ?? '') == $opt ? 'selected' : '' }}>{{ $opt }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    
    @if(!str_contains(Route::current()->getName(), 'show'))
        <div class="card-footer text-right">
            <a href="{{ route('funcionarios.index') }}" class="btn btn-default">Voltar</a>
            <button type="submit" class="btn btn-success">Salvar</button>
        </div>
    @endif
</div>

