<a href="{{ route('disciplinas_base.show', $item) }}" class="btn btn-sm my-0 btn-primary"><i class="fas fa-eye"></i></a>

@can('disciplinas_base.edit')
    <a href="{{ route('disciplinas_base.edit', $item) }}" class="btn btn-sm my-0 btn-warning"><i
            class="fas fa-edit"></i></a>
@endcan

@can('disciplinas_base.delete')
    <button type="button" class="btn btn-danger btn-sm"
        onclick="confirmarExclusao('{{ route('disciplinas_base.destroy', $item->id) }}','{{ $item->id }}')">
        <i class="fas fa-trash-alt"></i>
    </button>
@endcan