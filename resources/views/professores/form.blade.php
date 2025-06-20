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
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Graduação (Grau de Especialização)*</label>
                    <select name="graduacao" class="form-control select2bs4" required>
                        @foreach($opcoesGrad as $opt)
                            <option value="{{ $opt }}" {{ old('graduacao', $professor->graduacao ?? '') == $opt ? 'selected' : '' }}>
                                {{ $opt }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label>Titulação Principal*</label>
                    <select name="titulacao_principal" class="form-control select2bs4" required>
                        @foreach($opcoesTit as $opt)
                            <option value="{{ $opt }}" {{ old('titulacao_principal', $professor->titulacao_principal ?? '') == $opt ? 'selected' : '' }}>
                                {{ $opt }}
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