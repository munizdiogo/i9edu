<a href="{{ route('turmas.show', $turma) }}" class="btn btn-xs btn-primary">Ver</a>
<a href="{{ route('turmas.edit', $turma) }}" class="btn btn-xs btn-warning">Editar</a>
<form action="{{ route('turmas.destroy', $turma) }}" method="post" class="d-inline"
    onsubmit="return confirm('Apagar?')">
    @csrf @method('DELETE')
    <button class="btn btn-xs btn-danger">Apagar</button>
</form>