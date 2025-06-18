<a href="{{ route('profiles.show', $p) }}" class="btn btn-xs btn-primary">Ver</a>
<a href="{{ route('profiles.edit', $p) }}" class="btn btn-xs btn-warning">Editar</a>
<form action="{{ route('profiles.destroy', $p) }}" method="post" class="d-inline"
    onsubmit="return confirm('Confirma exclusão?')">
    @csrf @method('DELETE')
    <button class="btn btn-xs btn-danger">Apagar</button>
</form>