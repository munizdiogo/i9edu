<a href="{{ route('admissoes.show', $row) }}" class="btn btn-xs btn-primary">Ver</a>
<a href="{{ route('admissoes.edit', $row) }}" class="btn btn-xs btn-warning">Editar</a>
<form action="{{ route('admissoes.destroy', $row) }}" method="post" class="d-inline"
    onsubmit="return confirm('Apagar?')">
    @csrf @method('DELETE')
    <button class="btn btn-xs btn-danger">Apagar</button>
</form>