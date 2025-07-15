<a href="{{ route('contratos.show', $item) }}" class="btn btn-sm my-0 btn-primary"><i class="fas fa-eye"></i></a>
@can('contratos.edit')
    <a href="{{ route('contratos.edit', $item) }}" class="btn btn-sm my-0 btn-warning"><i class="fas fa-edit"></i></a>
@endcan
@can('contratos.delete')
    <form action="{{ route('contratos.destroy', $item) }}" method="post" class="d-inline"
        onsubmit="return confirm('Confirma exclusão?')">
        @csrf @method('DELETE')
        <button class="btn my-0 btn-danger"><i class="fas fa-trash-alt"></i></button>
    </form>
@endcan