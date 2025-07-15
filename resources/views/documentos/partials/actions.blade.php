<a href="{{ route('documentos.show', $item->id) }}" class="btn btn-info btn-sm"><i class="fas fa-eye"></i></a>

@can('documentos.edit')
    <a href="{{ route('documentos.edit', $item->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
@endcan

@can('documentos.delete')
    <button type="button" class="btn btn-danger btn-sm"
        onclick="confirmarExclusao('{{ route('documentos.destroy', $item->id) }}','{{ $item->id }}')">
        <i class="fas fa-trash-alt"></i>
    </button>
@endcan