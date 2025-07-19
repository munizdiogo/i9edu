<a href="{{ route('funcionarios.show', $item) }}" class="btn btn-sm my-0 btn-primary"><i class="fas fa-eye"></i></a>
@can('funcionarios.edit')
    <a href="{{ route('funcionarios.edit', $item) }}" class="btn btn-sm my-0 btn-warning"><i class="fas fa-edit"></i></a>
@endcan
@can('funcionarios.delete')
    <button type="button" class="btn btn-danger btn-sm"
        onclick="confirmarExclusao('{{ route('funcionarios.destroy', $item->id) }}','{{ $item->id }}')">
        <i class="fas fa-trash-alt"></i>
    </button>
@endcan