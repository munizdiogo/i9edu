<a href="{{ route('area_conhecimentos.show', $item) }}" class="btn btn-sm my-0 btn-primary"><i
        class="fas fa-eye"></i></a>

@can('area_conhecimentos.edit')
    <a href="{{ route('area_conhecimentos.edit', $item) }}" class="btn btn-sm my-0 btn-warning"><i
            class="fas fa-edit"></i></a>
@endcan

@can('area_conhecimentos.delete')
    <button type="button" class="btn btn-danger btn-sm"
        onclick="confirmarExclusao('{{ route('area_conhecimentos.destroy', $item->id) }}','{{ $item->id }}')">
        <i class="fas fa-trash-alt"></i>
    </button>
@endcan