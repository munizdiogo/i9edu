<a href="{{ route('alunos.show', $item) }}" class="btn btn-sm my-0 btn-primary"><i class="fas fa-eye"></i></a>


@can('alunos.edit')
    <a href="{{ route('alunos.edit', $item) }}" class="btn btn-sm my-0 btn-warning"><i class="fas fa-edit"></i></a>
@endcan

@can('alunos.delete')
    <button type="button" class="btn btn-danger btn-sm"
        onclick="confirmarExclusao('{{ route('alunos.destroy', $item->id) }}','{{ $item->id }}')">
        <i class="fas fa-trash-alt"></i>
    </button>
@endcan