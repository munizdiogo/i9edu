<a href="{{ route('etapas_periodos_letivos.show', $e) }}" class="btn btn-xs btn-primary">Ver</a>
<a href="{{ route('etapas_periodos_letivos.edit', $e) }}" class="btn btn-xs btn-warning">Editar</a>
<form action="{{ route('etapas_periodos_letivos.destroy', $e) }}" method="post" class="d-inline"
    onsubmit="return confirm('Apagar?')">
    @csrf @method('DELETE')
    <button class="btn btn-xs btn-danger">Apagar</button>
</form>