<a href="{{ route('cursos.show', $curso) }}" class="btn my-0 btn-primary"><i class="fas fa-eye"></i></a>
<a href="{{ route('cursos.edit', $curso) }}" class="btn my-0 btn-warning"><i class="fas fa-edit"></i></a>
<form action="{{ route('cursos.destroy', $curso) }}" method="post" class="d-inline"
    onsubmit="return confirm('Apagar?')">
    @csrf @method('DELETE')
    <button class="btn my-0 btn-danger"><i class="fas fa-trash-alt"></i></button>
</form>