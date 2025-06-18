<a href="{{ route('polos.show', $polo) }}" class="btn btn-xs btn-primary">Ver</a>
<a href="{{ route('polos.edit', $polo) }}" class="btn btn-xs btn-warning">Editar</a>
<form action="{{ route('polos.destroy', $polo) }}" method="post" class="d-inline"
    onsubmit="return confirm('Confirma exclusão?')">
    @csrf @method('DELETE')
    <button class="btn btn-xs btn-danger">Apagar</button>
</form>