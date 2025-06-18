<a href="{{ route('cursos.show', $curso) }}" class="btn btn-xs btn-primary">Ver</a>
<a href="{{ route('cursos.edit', $curso) }}" class="btn btn-xs btn-warning">Editar</a>
<form action="{{ route('cursos.destroy', $curso) }}" method="post" class="d-inline" onsubmit="return confirm('Apagar?')">
    @csrf @method('DELETE')
    <button class="btn btn-xs btn-danger">Apagar</button>
</form>