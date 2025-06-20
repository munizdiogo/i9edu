<a href="{{ route('modulos.show', $m) }}" class="btn btn-xs btn-primary">Ver</a>
<a href="{{ route('modulos.edit', $m) }}" class="btn btn-xs btn-warning">Editar</a>
<form action="{{ route('modulos.destroy', $m) }}" method="post" class="d-inline" onsubmit="return confirm('Apagar?')">
    @csrf @method('DELETE')
    <button class="btn btn-xs btn-danger">Apagar</button>
</form>