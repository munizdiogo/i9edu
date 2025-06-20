<a href="{{ route('setores.edit', $s) }}" class="btn btn-xs btn-warning">Editar</a>
<form action="{{ route('setores.destroy', $s) }}" method="post" class="d-inline" onsubmit="return confirm('Apagar?')">
    @csrf @method('DELETE')
    <button class="btn btn-xs btn-danger">Apagar</button>
</form>