<a href="{{ route('funcionarios.show', $f) }}" class="btn btn-xs btn-primary">Ver</a>
<a href="{{ route('funcionarios.edit', $f) }}" class="btn btn-xs btn-warning">Editar</a>
<form action="{{ route('funcionarios.destroy', $f) }}" method="post" class="d-inline"
    onsubmit="return confirm('Apagar?')">
    @csrf @method('DELETE')
    <button class="btn btn-xs btn-danger">Apagar</button>
</form>