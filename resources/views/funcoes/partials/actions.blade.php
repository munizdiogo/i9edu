<a href="{{ route('funcoes.show', $item->id) }}" class="btn btn-info btn-sm"><i class="fas fa-eye"></i></a>

@can('funcoes.edit')
    <a href="{{ route('funcoes.edit', $item->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
@endcan

@can('funcoes.delete')
    <button type="button" class="btn btn-danger btn-sm"
        onclick="confirmarExclusao('{{ route('funcoes.destroy', $item->id) }}','{{ $item->id }}')">
        <i class="fas fa-trash-alt"></i>
    </button>
@endcan