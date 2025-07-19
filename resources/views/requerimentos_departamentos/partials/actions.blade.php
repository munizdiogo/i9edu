<a href="{{ route('requerimentos_departamentos.show', $item->id) }}" class="btn btn-info btn-sm"><i
        class="fas fa-eye"></i></a>

@can('requerimentos_departamentos.edit')
    <a href="{{ route('requerimentos_departamentos.edit', $item->id) }}" class="btn btn-warning btn-sm"><i
            class="fas fa-edit"></i></a>
@endcan

@can('requerimentos_departamentos.delete')
    <button type="button" class="btn btn-danger btn-sm"
        onclick="confirmarExclusao('{{ route('requerimentos_departamentos.destroy', $item->id) }}','{{ $item->id }}')">
        <i class="fas fa-trash-alt"></i>
    </button>
@endcan