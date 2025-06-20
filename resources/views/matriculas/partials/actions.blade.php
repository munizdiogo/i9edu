<a href="{{ route('matriculas.show', $m) }}" class="btn btn-xs btn-primary">Ver</a>
<a href="{{ route('matriculas.edit', $m) }}" class="btn btn-xs btn-warning">Editar</a>
<form action="{{ route('matriculas.destroy', $m) }}" method="post" class="d-inline"
    onsubmit="return confirm('Deseja apagar esta matrícula?')">
    @csrf @method('DELETE')
    <button class="btn btn-xs btn-danger">Apagar</button>
</form>