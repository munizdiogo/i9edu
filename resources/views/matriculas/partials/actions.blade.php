<a href="{{ route('matriculas.show', $item) }}" class="btn btn-sm my-0 btn-primary"><i class="fas fa-eye"></i></a>

@can('matriculas.edit')
    <a href="{{ route('matriculas.edit', $item) }}" class="btn btn-sm my-0 btn-warning"><i class="fas fa-edit"></i></a>
@endcan

@can('matriculas.delete')
    <button type="button" class="btn btn-danger btn-sm"
        onclick="confirmarExclusao('{{ route('matriculas.destroy', $item->id) }}','{{ $item->id }}')">
        <i class="fas fa-trash-alt"></i>
    </button>
@endcan