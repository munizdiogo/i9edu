<div class="card card-primary">
    <div class="card-body">
        <div class="form-group">
            <label>Funcionário*</label>
            <select name="funcionario_id" class="form-control select2bs4" required>
                <option value=""></option>
                @foreach($funcionarios as $id => $nome)
                    <option value="{{ $id }}" {{ old('funcionario_id', $professor->funcionario_id ?? '') == $id ? 'selected' : '' }}>
                        {{ $nome }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-row">
            <div class="form-group col-md-4">
                <label>Graduação</label>
                <select name="graduacao_id" class="form-control select2bs4">
                    <option value=""></option>
                    @foreach($graduacoes as $id => $desc)
                        <option value="{{ $id }}" {{ old('graduacao_id', $professor->graduacao_id ?? '') == $id ? 'selected' : '' }}>
                            {{ $desc }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-md-4">
                <label>Titulação Principal</label>
                <select name="titulacao_principal_id" class="form-control select2bs4">
                    <option value=""></option>
                    @foreach($titulacoes as $id => $desc)
                        <option value="{{ $id }}" {{ old('titulacao_principal_id', $professor->titulacao_principal_id ?? '') == $id ? 'selected' : '' }}>
                            {{ $desc }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-md-4">
                <label>Tipo Docente</label>
                <select name="tipo_docente" class="form-control select2bs4">
                    @foreach(['Não possui', 'Docente', 'Tutor EAD', 'Docente/Tutor EAD'] as $opt)
                        <option value="{{ $opt }}" {{ old('tipo_docente', $professor->tipo_docente ?? '') == $opt ? 'selected' : '' }}>
                            {{ $opt }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
        {{-- Continue com os demais campos seguindo o mesmo padrão: regime_trabalho, situacao_docente, id_inep, etc.
        --}}
    </div>
</div>