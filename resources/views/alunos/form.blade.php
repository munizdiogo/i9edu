<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Dados Pessoais</h3>
    </div>
    <div class="card-body">
        <div class="form-row">
            <div class="form-group col-md-4">
                <label>Perfil*</label>
                <select name="perfil_id" class="form-control select2bs4" required>
                    <option value="">-- selecione --</option>
                    @foreach($perfis as $id => $nome)
                        <option value="{{ $id }}" {{ old('perfil_id', $aluno->perfil_id ?? '') == $id ? 'selected' : '' }}>
                            {{ $nome }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-md-4">
                <label>RA*</label>
                <input type="text" name="ra" class="form-control" value="{{ old('ra', $aluno->ra ?? '') }}" required>
            </div>
            <div class="form-group col-md-4">
                <label>RA Est.</label>
                <input type="text" name="ra_est" class="form-control" value="{{ old('ra_est', $aluno->ra_est ?? '') }}">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-4">
                <label>ID INEP</label>
                <input type="text" name="id_inep" class="form-control"
                    value="{{ old('id_inep', $aluno->id_inep ?? '') }}">
            </div>
            <div class="form-group col-md-4">
                <label>E-mail Institucional</label>
                <input type="email" name="email_institucional" class="form-control"
                    value="{{ old('email_institucional', $aluno->email_institucional ?? '') }}">
            </div>
            <div class="form-group col-md-4">
                <label>Status</label>
                <select name="status" class="form-control">
                    <option value="ATIVO" {{ old('status', $aluno->status ?? '') == 'ATIVO' ? 'selected' : '' }}>ATIVO
                    </option>
                    <option value="INATIVO" {{ old('status', $aluno->status ?? '') == 'INATIVO' ? 'selected' : '' }}>
                        INATIVO
                    </option>
                </select>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-3">
                <label>CPF</label>
                <input type="text" name="cpf" class="form-control" value="{{ old('cpf', $aluno->cpf ?? '') }}">
            </div>
            <div class="form-group col-md-3">
                <label>RG</label>
                <input type="text" name="rg" class="form-control" value="{{ old('rg', $aluno->rg ?? '') }}">
            </div>
            <div class="form-group col-md-3">
                <label>Órgão Expedidor</label>
                <input type="text" name="orgao_expedidor" class="form-control"
                    value="{{ old('orgao_expedidor', $aluno->orgao_expedidor ?? '') }}">
            </div>
            <div class="form-group col-md-3">
                <label>Data Expedição</label>
                <input type="date" name="data_expedicao" class="form-control"
                    value="{{ old('data_expedicao', $aluno->data_expedicao ?? '') }}">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-3">
                <label>Data Nascimento</label>
                <input type="date" name="data_nascimento" class="form-control"
                    value="{{ old('data_nascimento', $aluno->data_nascimento ?? '') }}">
            </div>
            <div class="form-group col-md-3">
                <label>Sexo</label>
                <select name="sexo" class="form-control">
                    <option value="">--</option>
                    <option value="Masculino" {{ old('sexo', $aluno->sexo ?? '') == 'Masculino' ? 'selected' : '' }}>
                        Masculino
                    </option>
                    <option value="Feminino" {{ old('sexo', $aluno->sexo ?? '') == 'Feminino' ? 'selected' : '' }}>
                        Feminino
                    </option>
                    <option value="Outro" {{ old('sexo', $aluno->sexo ?? '') == 'Outro' ? 'selected' : '' }}>Outro
                    </option>
                </select>
            </div>
            <div class="form-group col-md-3">
                <label>Estado Civil</label>
                <select name="estado_civil" class="form-control">
                    <option value="">--</option>
                    @foreach(['Solteiro(a)', 'Casado(a)', 'Divorciado(a)', 'Viúvo(a)'] as $ec)
                        <option value="{{ $ec }}" {{ old('estado_civil', $aluno->estado_civil ?? '') == $ec ? 'selected' : '' }}>
                            {{ $ec }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-md-3">
                <label>Nacionalidade</label>
                <input type="text" name="nacionalidade" class="form-control"
                    value="{{ old('nacionalidade', $aluno->nacionalidade ?? '') }}">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-4">
                <label>Naturalidade</label>
                <input type="text" name="naturalidade" class="form-control"
                    value="{{ old('naturalidade', $aluno->naturalidade ?? '') }}">
            </div>
            <div class="form-group col-md-4">
                <label>Religião</label>
                <input type="text" name="religiao" class="form-control"
                    value="{{ old('religiao', $aluno->religiao ?? '') }}">
            </div>
            <div class="form-group col-md-4">
                <label>Telefone</label>
                <input type="text" name="telefone" class="form-control"
                    value="{{ old('telefone', $aluno->telefone ?? '') }}">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-4">
                <label>Celular</label>
                <input type="text" name="celular" class="form-control"
                    value="{{ old('celular', $aluno->celular ?? '') }}">
            </div>
        </div>
    </div>
</div>

<div class="row mt-3">
    <div class="col text-right">
        <a href="{{ route('alunos.index') }}" class="btn btn-default">Voltar</a>
        <button type="submit" class="btn btn-primary">Salvar</button>
    </div>
</div>