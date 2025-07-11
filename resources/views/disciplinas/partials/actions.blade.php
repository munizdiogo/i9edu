<a href="{{ route('disciplinas.show', $d) }}" class="btn my-0 btn-primary"><i class="fas fa-eye"></i></a>
@can('disciplinas.edit')
    <a href="{{ route('disciplinas.edit', $d) }}" class="btn my-0 btn-warning"><i class="fas fa-edit"></i></a>
@endcan
@can('disciplinas.delete')
    <form action="{{ route('disciplinas.destroy', $d) }}" method="post" class="d-inline"
        onsubmit="return confirm('Confirma exclusão?')">
        @csrf @method('DELETE')
        <button class="btn my-0 btn-danger"><i class="fas fa-trash-alt"></i></button>
    </form>
@endcan