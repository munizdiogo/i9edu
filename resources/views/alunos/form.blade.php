<div class="card shadow-none card-primary">
    <div class="card-header">
        <h3 class="card-title">Dados Pessoais</h3>
    </div>
    <div class="card-body">
        <div class="form-row">
            <div class="form-group col-md-5">
                <label>Perfil*</label>
                <select name="perfil_id" class="form-control select2bs4" required>
                    <option value="">-- selecione --</option>
                    @foreach($perfis as $id => $nome)
                        <option value="{{ $id }}" {{ old('perfil_id', $aluno->perfil_id ?? '') == $id ? 'selected' : '' }}>
                            {{ $id . ' -- ' . $nome }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-md-2">
                <label>RA*</label>
                <input type="text" name="ra" class="form-control" value="{{ old('ra', $aluno->ra ?? '') }}" required>
            </div>
            <div class="form-group col-md-3">
                <label>E-mail Institucional</label>
                <input type="email" name="email_institucional" class="form-control"
                    value="{{ old('email_institucional', $aluno->email_institucional ?? '') }}">
            </div>
            <div class="form-group col-md-2">
                <label>Status</label>
                <select name="status" class="form-control fw-bold text-success">
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
                <label>Data Nascimento</label>
                <input type="date" name="data_nascimento" class="form-control"
                    value="{{ old('data_nascimento', $aluno->data_nascimento ?? '') }}">
            </div>
            <div class="form-group col-md-2">
                <label>RA Est.</label>
                <input type="text" name="ra_est" class="form-control" value="{{ old('ra_est', $aluno->ra_est ?? '') }}">
            </div>
            <div class="form-group col-md-2">
                <label>ID INEP</label>
                <input type="text" name="id_inep" class="form-control"
                    value="{{ old('id_inep', $aluno->id_inep ?? '') }}">
            </div>
        </div>

    </div>
</div>

<div class="row mt-3">
    <div class="col text-right">
        <a href="{{ route('alunos.index') }}" class="btn btn-default btn-form">Voltar</a>
        <button type="submit" class="btn btn-primary  btn-form">Salvar</button>
    </div>
</div>