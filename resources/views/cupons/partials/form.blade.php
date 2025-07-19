<div class="card card-primary p-5">
    <div class="form-group">
        <label for="codigo">Código do Cupom*</label>
        <input type="text" name="codigo" value="{{ old('codigo', $cupom->codigo ?? '') }}" class="form-control"
            required>
    </div>
    <div class="form-group">
        <label for="descricao">Descrição</label>
        <input type="text" name="descricao" value="{{ old('descricao', $cupom->descricao ?? '') }}"
            class="form-control">
    </div>
    <div class="row">
        <div class="form-group col-md-6">
            <label for="data_inicio">Válido de*</label>
            <input type="date" name="data_inicio" value="{{ old('data_inicio', $cupom->data_inicio ?? '') }}"
                class="form-control" required>
        </div>
        <div class="form-group col-md-6">
            <label for="data_fim">Até*</label>
            <input type="date" name="data_fim" value="{{ old('data_fim', $cupom->data_fim ?? '') }}"
                class="form-control" required>
        </div>
    </div>
    <div class="form-group">
        <label for="convenio_id">Convênio</label>
        <select name="convenio_id" class="form-control">
            <option value="">Selecione...</option>
            @foreach($convenios as $convenio)
                <option value="{{ $convenio->id }}" {{ old('convenio_id', $cupom->convenio_id ?? '') == $convenio->id ? 'selected' : '' }}>
                    {{ $convenio->descricao }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="id_plano_conta">Plano de Conta</label>
        <select name="id_plano_conta" class="form-control">
            <option value="">Selecione...</option>
            @foreach($planos as $plano)
                <option value="{{ $plano->id }}" {{ old('id_plano_conta', $cupom->id_plano_conta ?? '') == $plano->id ? 'selected' : '' }}>
                    {{ $plano->descricao ?? $plano->codigo }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="quantidade_maxima">Qtd Máxima</label>
        <input type="number" name="quantidade_maxima"
            value="{{ old('quantidade_maxima', $cupom->quantidade_maxima ?? 0) }}" class="form-control" min="0">
    </div>
    <div class="row">
        <div class="form-group col-md-4">
            <label for="status">Status*</label>
            <select name="status" class="form-control" required>
                <option value="ATIVO" {{ old('status', $cupom->status ?? '') == 'ATIVO' ? 'selected' : '' }}>Ativo
                </option>
                <option value="INATIVO" {{ old('status', $cupom->status ?? '') == 'INATIVO' ? 'selected' : '' }}>Inativo
                </option>
            </select>
        </div>
        <div class="form-group col-md-4 mt-4">
            <div class="form-check">
                <input type="checkbox" class="form-check-input" name="criar_convenio_pagador"
                    id="criar_convenio_pagador" {{ old('criar_convenio_pagador', $cupom->criar_convenio_pagador ?? false) ? 'checked' : '' }}>
                <label class="form-check-label" for="criar_convenio_pagador">Criar Convênio Pagador</label>
            </div>
            <div class="form-check">
                <input type="checkbox" class="form-check-input" name="validar_matricula_ativa"
                    id="validar_matricula_ativa" {{ old('validar_matricula_ativa', $cupom->validar_matricula_ativa ?? false) ? 'checked' : '' }}>
                <label class="form-check-label" for="validar_matricula_ativa">Validar se o aluno possui matrícula
                    ativa</label>
            </div>
        </div>
    </div>
</div>


@if(!str_contains(Route::current()->getName(), 'show'))
    <div class="card-footer text-right">
        <a href="{{ route('cupons.index') }}" class="btn btn-default">Voltar</a>
        <button type="submit" class="btn btn-success">Salvar</button>
    </div>
@endif