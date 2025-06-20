<a href="{{ route('professores.edit', $p) }}" class="btn btn-xs btn-warning">Editar</a>
<form action="{{ route('professores.destroy', $p) }}" method="post" class="d-inline"
    onsubmit="return confirm('Apagar?')">
    @csrf @method('DELETE')
    <button class="btn btn-xs btn-danger">Apagar</button>
</form>