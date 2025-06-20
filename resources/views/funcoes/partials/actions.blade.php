<a href="{{ route('funcoes.edit', $f) }}" class="btn btn-xs btn-warning">Editar</a>
<form action="{{ route('funcoes.destroy', $f) }}" method="post" class="d-inline" onsubmit="return confirm('Apagar?')">
    @csrf @method('DELETE')
    <button class="btn btn-xs btn-danger">Apagar</button>
</form>