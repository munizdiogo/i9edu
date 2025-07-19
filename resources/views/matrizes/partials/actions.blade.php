<a href="{{ route('matrizes.show', $item) }}" class="btn btn-sm btn-primary"><i class="fas fa-eye"></i></a>

@can('matrizes.edit')
    <a href="{{ route('matrizes.edit', $item) }}" class="btn btn-sm my-0 btn-warning"><i class="fas fa-edit"></i></a>
@endcan

@can('matrizes.delete')
    <button type="button" class="btn btn-danger btn-sm"
        onclick="confirmarExclusao('{{ route('matrizes.destroy', $item->id) }}','{{ $item->id }}')">
        <i class="fas fa-trash-alt"></i>
    </button>
@endcan