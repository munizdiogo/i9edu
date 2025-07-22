<div class="mb-3">
    <form method="POST" action="{{ route('cupons.polos.adicionar', $cupom->id) }}">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <label>
                    Polos
                    <input type="checkbox" id="select-all-polos" class="ml-2" style="transform: scale(1.2);"> Selecionar
                    todos
                </label>
                <select name="id_polos[]" id="polos-select" class="form-control select2" multiple required>
                    @foreach($polos as $polo)
                        <option value="{{ $polo->id }}">{{ $polo->nome }}{{ $polo->cidade ? ' - ' . $polo->cidade : '' }}
                        </option>
                    @endforeach
                </select>
                <small class="text-muted">Selecione um ou mais polos</small>
            </div>
            <div class="col-md-3">
                <label>Quantidade Disponível</label>
                <input type="number" name="quantidade_disponivel" class="form-control" value="0" min="0" required>
            </div>
            <div class="col-md-3 d-flex align-items-end">
                <button class="btn btn-success">Adicionar Polo(s)</button>

            </div>
        </div>
    </form>
    <form method="POST" action="{{ route('cupons.polos.remover_todos', $cupom->id) }}"
        onsubmit="return confirm('Tem certeza que deseja remover TODOS os polos deste cupom?');"
        class="mb-2 d-inline-block">
        @csrf
        @method('DELETE')
        <button class="btn btn-danger btn-sm">Remover todos</button>
    </form>
</div>
<table class="table table-bordered" id="cupom-polos-table">
    <thead>
        <tr>
            <th>Nome do Polo</th>
            <th>Cidade</th>
            <th>Qtd. Disponível</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach($cupom->polos as $polo)
            <tr>
                <td>{{ $polo->nome }}</td>
                <td>{{ $polo->cidade ?? '' }}</td>
                <td>{{ $polo->pivot->quantidade_disponivel }}</td>
                <td>
                    <form method="POST" action="{{ route('cupons.polos.remover', [$cupom->id, $polo->id]) }}"
                        onsubmit="return confirm('Remover polo deste cupom?')">
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
                placeholder: 'Selecione os polos',
                width: '100%'
            });

            $('#select-all-polos').on('change', function () {
                if (this.checked) {
                    // Seleciona todos
                    var allValues = [];
                    $('#polos-select option').each(function () {
                        allValues.push($(this).val());
                    });
                    $('#polos-select').val(allValues).trigger('change');
                } else {
                    // Remove seleção
                    $('#polos-select').val([]).trigger('change');
                }
            });
        });
    </script>
@endpush