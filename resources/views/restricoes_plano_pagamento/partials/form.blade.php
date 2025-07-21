<div class="card p-4">
    <div class="form-group">
        <label for="id_plano_pagamento">Plano de Pagamento *</label>
        <select class="form-control" name="id_plano_pagamento" required>
            <option value="">Selecione</option>
            @foreach($planos as $plano)
                <option value="{{ $plano->id }}" {{ (isset($restricao) && $restricao->id_plano_pagamento == $plano->id) ? 'selected' : '' }}>
                    {{ $plano->nome }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label>
            Cursos
            <input type="checkbox" id="select-all-cursos" class="ml-2"> Selecionar todos
        </label>
        <select name="id_cursos[]" id="cursos-select" class="form-control select2" multiple>
            @foreach($cursos as $curso)
                <option value="{{ $curso->id }}" {{ (isset($restricao) && $restricao->cursos->contains($curso->id)) ? 'selected' : '' }}>
                    {{ $curso->nome }}
                </option>
            @endforeach
        </select>
        <button type="button" class="btn btn-danger btn-xs mt-1" id="remover-todos-cursos">Remover todos</button>
    </div>
    <div class="form-group">
        <label>
            Polos
            <input type="checkbox" id="select-all-polos" class="ml-2"> Selecionar todos
        </label>
        <select name="id_polos[]" id="polos-select" class="form-control select2" multiple>
            @foreach($polos as $polo)
                <option value="{{ $polo->id }}" {{ (isset($restricao) && $restricao->polos->contains($polo->id)) ? 'selected' : '' }}>
                    {{ $polo->nome }}
                </option>
            @endforeach
        </select>
        <button type="button" class="btn btn-danger btn-xs mt-1" id="remover-todos-cursos">Remover todos</button>
    </div>
    <div class="form-group">
        <label>
            Turmas
            <input type="checkbox" id="select-all-turmas" class="ml-2"> Selecionar todos
        </label>
        <select name="turma_ids[]" id="turmas-select" class="form-control select2" multiple>
            @foreach($turmas as $turma)
                <option value="{{ $turma->id }}" {{ (isset($restricao) && $restricao->turmas->contains($turma->id)) ? 'selected' : '' }}>
                    {{ $turma->nome }}
                </option>
            @endforeach
        </select>
        <button type="button" class="btn btn-danger btn-xs mt-1" id="remover-todos-cursos">Remover todos</button>
    </div>
    <div class="form-group">
        <label for="modalidade">Modalidade</label>
        <input type="text" class="form-control" name="modalidade" value="{{ $restricao->modalidade ?? '' }}"
            maxlength="50">
    </div>
</div>

@push('js')
    <script>
        $(function () {
            // Cursos
            $('#select-all-cursos').on('change', function () {
                let all = [];
                $('#cursos-select option').each(function () { all.push($(this).val()); });
                $('#cursos-select').val(this.checked ? all : []).trigger('change');
            });
            $('#remover-todos-cursos').click(function () {
                $('#cursos-select').val([]).trigger('change');
                $('#select-all-cursos').prop('checked', false);
            });

            // Polos
            $('#select-all-polos').on('change', function () {
                let all = [];
                $('#polos-select option').each(function () { all.push($(this).val()); });
                $('#polos-select').val(this.checked ? all : []).trigger('change');
            });
            $('#remover-todos-polos').click(function () {
                $('#polos-select').val([]).trigger('change');
                $('#select-all-polos').prop('checked', false);
            });

            // Turmas
            $('#select-all-turmas').on('change', function () {
                let all = [];
                $('#turmas-select option').each(function () { all.push($(this).val()); });
                $('#turmas-select').val(this.checked ? all : []).trigger('change');
            });
            $('#remover-todos-turmas').click(function () {
                $('#turmas-select').val([]).trigger('change');
                $('#select-all-turmas').prop('checked', false);
            });

            // Inicializa select2
            $('.select2').select2({
                placeholder: 'Selecione',
                width: '100%'
            });
        });
    </script>
@endpush


@if(!str_contains(Route::current()->getName(), 'show'))
    <div class="mt-3 text-right pb-5">
        <a href="{{ route('restricoes_plano_pagamento.index') }}" class="btn btn-default">Voltar</a>
        <button type="submit" class="btn btn-success">Salvar</button>
    </div>
@endif