<a href="{{ route('etapas_periodos_letivos.show', $item) }}" class="btn btn-sm my-0 btn-primary"><i
        class="fas fa-eye"></i></a>
@can('etapas_periodos_letivos.edit')
    <a href="{{ route('etapas_periodos_letivos.edit', $item) }}" class="btn btn-sm my-0 btn-warning"><i
            class="fas fa-edit"></i></a>
@endcan
@can('etapas_periodos_letivos.delete')
    <button type="button" class="btn btn-danger btn-sm"
        onclick="confirmarExclusao('{{ route('etapas_periodos_letivos.destroy', $item->id) }}','{{ $item->id }}')">
        <i class="fas fa-trash-alt"></i>
    </button>
@endcan