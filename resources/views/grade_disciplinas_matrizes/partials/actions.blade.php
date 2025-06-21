<a href="{{ route('grade_disciplinas_matrizes.show', $g) }}" class="btn btn-primary"><i class="fas fa-eye"></i></a>
<a href="{{ route('grade_disciplinas_matrizes.edit', $g) }}" class="btn btn-warning"><i class="fas fa-edit"></i></a>
<form action="{{ route('grade_disciplinas_matrizes.destroy', $g) }}" method="post" class="d-inline"
    onsubmit="return confirm('Apagar?')">
    @csrf @method('DELETE')
    <button class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
</form>