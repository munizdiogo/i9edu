<a href="{{ route('grade_disciplinas_matrizes.edit', $g) }}" class="btn btn-xs btn-warning">Editar</a>
<form action="{{ route('grade_disciplinas_matrizes.destroy', $g) }}" method="post" class="d-inline"
    onsubmit="return confirm('Remover?')">
    @csrf @method('DELETE')
    <button class="btn btn-xs btn-danger">Apagar</button>
</form>