<a href="{{ route('grade_disciplinas_matrizes.show', $item) }}" class="btn btn-sm btn-primary"><i
        class="fas fa-eye"></i></a>

@can('grade_disciplinas_matrizes.edit')
    <a href="{{ route('grade_disciplinas_matrizes.edit', $item->id) }}" class="btn btn-warning btn-sm"><i
            class="fas fa-edit"></i></a>
@endcan

@can('grade_disciplinas_matrizes.delete')
    <button type="button" class="btn btn-danger btn-sm"
        onclick="confirmarExclusao('{{ route('grade_disciplinas_matrizes.destroy', $item->id) }}','{{ $item->id }}')">
        <i class="fas fa-trash-alt"></i>
    </button>
@endcan