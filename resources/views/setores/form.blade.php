<div class="card card-primary">
    <div class="card-body">
        <div class="form-row">
            <div class="form-group col-md-2">
                <label>Código*</label>
                <input type="number" name="codigo" class="form-control" required
                    value="{{ old('codigo', $setor->codigo ?? '') }}">
            </div>
            <div class="form-group col-md-4">
                <label>Descrição*</label>
                <input type="text" name="descricao" class="form-control" required
                    value="{{ old('descricao', $setor->descricao ?? '') }}">
            </div>
            <div class="form-group col-md-3">
                <label>Tipo*</label>
                <select name="tipo" class="form-control select2bs4" required>
                    @foreach($tipos as $opt)
                        <option value="{{ $opt }}" {{ old('tipo', $setor->tipo ?? '') == $opt ? 'selected' : '' }}>{{ $opt }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-3">
                <label>Email</label>
                <input type="email" name="email" class="form-control" value="{{ old('email', $setor->email ?? '') }}">
            </div>
            <div class="form-group col-md-4">
                <label>Func. Responsável</label>
                <select name="funcionario_responsavel_id" class="form-control select2bs4">
                    <option value=""></option>
                    @foreach($funcionarios as $id => $nome)
                        <option value="{{ $id }}" {{ old('funcionario_responsavel_id', $setor->funcionario_responsavel_id ?? '') == $id ? 'selected' : '' }}>
                            {{ $nome }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-md-2">
                <label>Status*</label>
                <select name="status" class="form-control select2bs4" required>
                    <option value="ATIVO" {{ old('status', $setor->status ?? '') == 'ATIVO' ? 'selected' : '' }}>ATIVO</option>
                    <option value="INATIVO" {{ old('status', $setor->status ?? '') == 'INATIVO' ? 'selected' : '' }}>INATIVO
                    </option>
                </select>
            </div>
        </div>
    </div>
</div>
<div class="mt-3 text-right">
    <a href="{{ route('setores.index') }}" class="btn btn-default">Voltar</a>
    <button type="submit" class="btn btn-primary">Salvar</button>
</div>