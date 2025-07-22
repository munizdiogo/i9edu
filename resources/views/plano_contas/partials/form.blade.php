<div class="card card-primary">
    <div class="card-body">
        <div class="form-row">
            <div class="form-group col-md-3">
                <label for="status" class="form-label">Status*</label>
                <select name="status" class="form-control form-select" required>
                    <option value="Ativo" {{ old('status', $planoConta->status ?? '') == 'Ativo' ? 'selected' : '' }}>
                        Ativo
                    </option>
                    <option value="Inativo" {{ old('status', $planoConta->status ?? '') == 'Inativo' ? 'selected' : '' }}>
                        Inativo
                    </option>
                </select>
            </div>
            <div class="form-group col-md-3">
                <label for="codigo" class="form-label">Código*</label>
                <input type="text" class="form-control" name="codigo"
                    value="{{ old('codigo', $planoConta->codigo ?? '') }}" required>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="descricao" class="form-label">Descrição*</label>
                <input type="text" class="form-control" name="descricao"
                    value="{{ old('descricao', $planoConta->descricao ?? '') }}" required>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-3">
                <label for="operacao" class="form-label">Operação*</label>
                <select name="operacao" class="form-control form-select" required>
                    <option value="Soma" {{ old('operacao', $planoConta->operacao ?? '') == 'Soma' ? 'selected' : '' }}>
                        Soma
                    </option>
                    <option value="Subtração" {{ old('operacao', $planoConta->operacao ?? '') == 'Subtração' ? 'selected' : ''}}>
                        Subtração
                    </option>
                </select>
            </div>
            <div class="form-group col-md-3">
                <label for="tipo_conta" class="form-label">Tipo Conta*</label>
                <select name="tipo_conta" class="form-control form-select" required>
                    <option value="Sintética" {{ old('tipo_conta', $planoConta->tipo_conta ?? '') == 'Sintética' ? 'selected' : ''}}>
                        Sintética
                    </option>
                    <option value="Analítica" {{ old('tipo_conta', $planoConta->tipo_conta ?? '') == 'Analítica' ? 'selected' : ''}}>
                        Analítica
                    </option>
                </select>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-3">
                <label for="id_grupo_conta" class="form-label">Grupo de Contas</label>
                <select name="id_grupo_conta" class="form-control form-select">
                    @foreach ($gruposContas as $grupo)
                        @if(isset($grupo->id))
                                    <option value="{{ $grupo->id ?? ''}}" {{ old('id_grupo_conta', $planoConta->id_grupo_conta ?? '') == $grupo->id ?
                            'selected' : '' }}>
                                        {{ $grupo->descricao }}
                                    </option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="form-group col-md-3">
                <label for="natureza" class="form-label">Natureza*</label>
                <select name="natureza" class="form-control form-select" required>
                    <option value="ATIVO" {{ old('natureza', $planoConta->natureza ?? '') == 'ATIVO' ? 'selected' : '' }}>
                        ATIVO
                    </option>
                    <option value="PASSIVO" {{ old('natureza', $planoConta->natureza ?? '') == 'PASSIVO' ? 'selected' : ''}}>
                        PASSIVO
                    </option>
                    <option value="PATRIMONIO" {{ old('natureza', $planoConta->natureza ?? '') == 'PATRIMONIO' ? 'selected' : ''}}>
                        PATRIMONIO
                    </option>
                    <option value="RECEITA" {{ old('natureza', $planoConta->natureza ?? '') == 'RECEITA' ? 'selected' : ''}}>
                        RECEITA
                    </option>
                    <option value="DESPESA" {{ old('natureza', $planoConta->natureza ?? '') == 'DESPESA' ? 'selected' : ''}}>
                        DESPESA
                    </option>
                </select>
            </div>
        </div>
    </div>
</div>


@if(!str_contains(Route::current()->getName(), 'show'))
    <div class="card-footer text-right">
        <a href="{{ route('plano-contas.index') }}" class="btn btn-default">Voltar</a>
        <button type="submit" class="btn btn-success">Salvar</button>
    </div>
@endif