<a href="{{ route('disciplinas.show', $d) }}" class="btn btn-xs btn-primary">Ver</a>
<a href="{{ route('disciplinas.edit', $d) }}" class="btn btn-xs btn-warning">Editar</a>
<form action="{{ route('disciplinas.destroy', $d) }}" method="post" class="d-inline"
    onsubmit="return confirm('Apagar?')">
    @csrf @method('DELETE')
    <button class="btn btn-xs btn-danger">Apagar</button>
</form>