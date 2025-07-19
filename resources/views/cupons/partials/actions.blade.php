<a href="{{ route('cupons.show', $item) }}" class="btn btn-sm my-0 btn-primary">
    <i class="fas fa-eye"></i>
</a>

@can('cupons.edit')
    <a href="{{ route('cupons.edit', $item) }}" class="btn btn-sm my-0 btn-warning"><i class="fas fa-edit"></i></a>
@endcan

@can('cupons.delete')
    <button type="button" class="btn btn-danger btn-sm"
        onclick="confirmarExclusao('{{ route('cupons.destroy', $item->id) }}','{{ $item->id }}')">
        <i class="fas fa-trash-alt"></i>
    </button>
@endcan