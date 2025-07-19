<div class="card card-primary p-2">
    <div class="card-header">
        <h3 class="card-title">Dados do Curso</h3>
    </div>
    <div class="card-body">
        <div class="form-group">
            <label for="nome_impressao1">Nome para Impressão 1*</label>
            <input type="text" name="nome_impressao1" id="nome_impressao1"
                value="{{ old('nome_impressao1', $curso->nome_impressao1 ?? '') }}" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="nome_impressao2">Nome para Impressão 2</label>
            <input type="text" name="nome_impressao2" id="nome_impressao2"
                value="{{ old('nome_impressao2', $curso->nome_impressao2 ?? '') }}" class="form-control">
        </div>
        <div class="form-group">
            <label for="nome_impressao3">Nome para Impressão 3</label>
            <input type="text" name="nome_impressao3" id="nome_impressao3"
                value="{{ old('nome_impressao3', $curso->nome_impressao3 ?? '') }}" class="form-control">
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="nome_reduzido">Nome Reduzido</label>
                <input type="text" name="nome_reduzido" id="nome_reduzido"
                    value="{{ old('nome_reduzido', $curso->nome_reduzido ?? '') }}" class="form-control">
            </div>
            <div class="form-group col-md-3">
                <label for="grau_academico">Grau Acadêmico</label>
                <select name="grau_academico" id="grau_academico" class="form-control">
                    @foreach(['BACHARELADO', 'LICENCIATURA', 'TECNÓLOGO', 'MESTRADO', 'DOUTORADO'] as $g)
                        <option value="{{ $g }}" {{ old('grau_academico', $curso->grau_academico ?? '') == $g ? 'selected' : '' }}>{{ ucfirst(strtolower($g)) }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-md-3">
                <label for="status">Status</label>
                <select name="status" id="status" class="form-control">
                    <option value="ATIVO" {{ old('status', $curso->status ?? '') == 'ATIVO' ? 'selected' : '' }}>ATIVO
                    </option>
                    <option value="INATIVO" {{ old('status', $curso->status ?? '') == 'INATIVO' ? 'selected' : '' }}>
                        INATIVO
                    </option>
                </select>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="regime_funcionamento">Regime de Funcionamento</label>
                <select name="regime_funcionamento" id="regime_funcionamento" class="form-control">
                    @foreach(['PRESENCIAL', 'EaD', 'HÍBRIDO'] as $r)
                        <option value="{{ $r }}" {{ old('regime_funcionamento', $curso->regime_funcionamento ?? '') == $r ? 'selected' : '' }}>{{ ucfirst(strtolower($r)) }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-md-4">
                <label for="modalidade">Modalidade</label>
                <select name="modalidade" id="modalidade" class="form-control">
                    @foreach(['Presencial', 'EaD', 'Híbrido'] as $m)
                        <option value="{{ $m }}" {{ old('modalidade', $curso->modalidade ?? '') == $m ? 'selected' : '' }}>
                            {{ $m }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-md-4">
                <label for="codigo_emec">Código E-MEC</label>
                <input type="text" name="codigo_emec" id="codigo_emec"
                    value="{{ old('codigo_emec', $curso->codigo_emec ?? '') }}" class="form-control">
            </div>
        </div>
        <div class="form-group">
            <label for="link_emec">Link E-MEC</label>
            <input type="url" name="link_emec" id="link_emec" value="{{ old('link_emec', $curso->link_emec ?? '') }}"
                class="form-control">
        </div>
    </div>
</div>


@if(!str_contains(Route::current()->getName(), 'show'))
    <div class="card-footer text-right">
        <a href="{{ route('cursos.index') }}" class="btn btn-default">Voltar</a>
        <button type="submit" class="btn btn-success">Salvar</button>
    </div>
@endif