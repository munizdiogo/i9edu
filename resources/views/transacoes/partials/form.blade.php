<div class="card card-primary">
    <div class="card-body">
        <div class="form-group">
            <label for="id_matricula">Matrícula*</label>
            <select name="id_matricula" class="form-control select2" required>
                <option value="">Selecione...</option>
                @foreach($matriculas as $id => $nome)
                    <option value="{{ $id }}" {{ old('id_matricula', $transacao->id_matricula ?? '') == $id ? 'selected' : '' }}>
                        {{ $nome }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="id_pagador">Pagador*</label>
            <select name="id_pagador" class="form-control select2" required>
                <option value="">Selecione...</option>
                @foreach($pagadores as $id => $nome)
                    <option value="{{ $id }}" {{ old('id_pagador', $transacao->id_pagador ?? '') == $id ? 'selected' : '' }}>
                        {{ $nome }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="descricao">Descrição</label>
            <input type="text" name="descricao" class="form-control"
                value="{{ old('descricao', $transacao->descricao ?? '') }}">
        </div>

        <div class="form-group">
            <label for="competencia">Competência</label>
            <input type="text" name="competencia" class="form-control"
                value="{{ old('competencia', $transacao->competencia ?? '') }}">
        </div>

        <div class="form-group">
            <label for="data_vencimento">Data de Vencimento*</label>
            <input type="date" name="data_vencimento" class="form-control"
                value="{{ old('data_vencimento', isset($transacao->data_vencimento) ? date_create($transacao->data_vencimento)->format('Y-m-d') : '') }}"
                required>
        </div>

        <div class="form-group">
            <label for="valor">Valor*</label>
            <input type="text" name="valor" class="form-control" value="{{ old('valor', $transacao->valor ?? '') }}"
                required>
        </div>

        <div class="form-group">
            <label for="valor_pago">Valor Pago</label>
            <input type="text" name="valor_pago" class="form-control"
                value="{{ old('valor_pago', $transacao->valor_pago ?? '') }}">
        </div>

        <div class="form-group">
            <label for="situacao">Situação</label>
            <select name="situacao" class="form-control">
                <option value="ABERTO" {{ old('situacao', $transacao->situacao ?? '') == 'ABERTO' ? 'selected' : '' }}>
                    ABERTO
                </option>
                <option value="PAGO" {{ old('situacao', $transacao->situacao ?? '') == 'PAGO' ? 'selected' : '' }}>PAGO
                </option>
                <option value="CANCELADO" {{ old('situacao', $transacao->situacao ?? '') == 'CANCELADO' ? 'selected' : '' }}>
                    CANCELADO</option>
            </select>
        </div>

        <div class="form-group">
            <label for="status">Status</label>
            <select name="status" class="form-control">
                <option value="ativo" {{ old('status', $transacao->status ?? '') == 'ativo' ? 'selected' : '' }}>Ativo
                </option>
                <option value="inativo" {{ old('status', $transacao->status ?? '') == 'inativo' ? 'selected' : '' }}>
                    Inativo
                </option>
            </select>
        </div>
    </div>
</div>

@if(!str_contains(Route::current()->getName(), 'show'))
    <div class="card-footer text-right">
        <a href="{{ route('transacoes.index') }}" class="btn btn-default">Voltar</a>
        <button type="submit" class="btn btn-success">Salvar</button>
</div> @endif <!-- Adicione outros campos conforme o necessário -->

@push('js')
    <script>
        $(function () {
            $('.select2').select2({ width: '100%' });
        });
    </script>
@endpush