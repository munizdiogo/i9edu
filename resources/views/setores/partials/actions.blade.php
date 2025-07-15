<a href="{{ route('setores.show', $item->id) }}" class="btn btn-info btn-sm"><i class="fas fa-eye"></i></a>

@can('setores.edit')
    <a href="{{ route('setores.edit', $item->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
@endcan

@can('setores.delete')
    <button type="button" class="btn btn-danger btn-sm"
        onclick="confirmarExclusao('{{ route('setores.destroy', $item->id) }}','{{ $item->id }}')">
        <i class="fas fa-trash-alt"></i>
    </button>
@endcan