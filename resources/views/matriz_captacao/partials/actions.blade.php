<a href="{{ route('matriz-captacao.show', $item) }}" class="btn btn-sm my-0 btn-primary"><i class="fas fa-eye"></i></a>

@can('matriz-captacao.edit')
    <a href="{{ route('matriz-captacao.edit', $item) }}" class="btn btn-sm my-0 btn-warning"><i class="fas fa-edit"></i></a>
@endcan

@can('matriz-captacao.delete')
    <button type="button" class="btn btn-danger btn-sm"
        onclick="confirmarExclusao('{{ route('matriz-captacao.destroy', $item->id) }}','{{ $item->id }}')">
        <i class="fas fa-trash-alt"></i>
    </button>
@endcan