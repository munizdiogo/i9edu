<div class="mb-3">
    <form method="POST" action="{{ route('cupons.cursos.adicionar', $cupom->id) }}">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <label>
                    Cursos
                    <input type="checkbox" id="select-all-cursos" class="ml-2" style="transform: scale(1.2);">
                    Selecionar todos
                </label>
                <select name="curso_ids[]" id="cursos-select" class="form-control select2" multiple required>
                    @foreach($cursos as $curso)
                        <option value="{{ $curso->id }}">
                            {{ $curso->nome }}{{ $curso->areaConhecimento ? ' - ' . $curso->areaConhecimento->nome : '' }}
                        </option>
                    @endforeach
                </select>
                <small class="text-muted">Selecione um ou mais cursos</small>
            </div>
            <div class="col-md-3">
                <label>Quantidade Disponível</label>
                <input type="number" name="quantidade_disponivel" class="form-control" value="0" min="0" required>
            </div>
            <div class="col-md-3 d-flex align-items-end">
                <button class="btn btn-success">Adicionar Curso(s)</button>
            </div>
        </div>

    </form>
    <form method="POST" action="{{ route('cupons.cursos.remover_todos', $cupom->id) }}"
        onsubmit="return confirm('Tem certeza que deseja remover TODOS os cursos deste cupom?');"
        class="mb-2 d-inline-block">
        @csrf
        @method('DELETE')
        <button class="btn btn-danger btn-sm">Remover todos</button>
    </form>
</div>
<table class="table table-bordered" id="cupom-cursos-table">
    <thead>
        <tr>
            <th>Nome do Curso</th>
            <th>Área de Conhecimento</th>
            <th>Qtd. Disponível</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach($cupom->cursos as $curso)
            <tr>
                <td>{{ $curso->nome }}</td>
                <td>{{ $curso->areaConhecimento->nome ?? '' }}</td>
                <td>{{ $curso->pivot->quantidade_disponivel }}</td>
                <td>
                    <form method="POST" action="{{ route('cupons.cursos.remover', [$cupom->id, $curso->id]) }}"
                        onsubmit="return confirm('Remover curso deste cupom?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm">Remover</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

@push('js')
    <script>
        $(function () {
            $('.select2').select2({
                placeholder: 'Selecione os itens',
                width: '100%'
            });

            // Polos
            $('#select-all-polos').on('change', function () {
                if (this.checked) {
                    var allValues = [];
                    $('#polos-select option').each(function () {
                        allValues.push($(this).val());
                    });
                    $('#polos-select').val(allValues).trigger('change');
                } else {
                    $('#polos-select').val([]).trigger('change');
                }
            });

            // Cursos
            $('#select-all-cursos').on('change', function () {
                if (this.checked) {
                    var allValues = [];
                    $('#cursos-select option').each(function () {
                        allValues.push($(this).val());
                    });
                    $('#cursos-select').val(allValues).trigger('change');
                } else {
                    $('#cursos-select').val([]).trigger('change');
                }
            });
        });
    </script>
@endpush