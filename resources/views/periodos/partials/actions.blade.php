<a href="{{ route('periodos.show', $periodo) }}" class="btn btn-xs btn-primary">Ver</a>
<a href="{{ route('periodos.edit', $periodo) }}" class="btn btn-xs btn-warning">Editar</a>
<form action="{{ route('periodos.destroy', $periodo) }}" method="post" class="d-inline"
    onsubmit="return confirm('Confirma exclusão?')">
    @csrf @method('DELETE')
    <button class="btn btn-xs btn-danger">Apagar</button>
</form>