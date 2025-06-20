<a href="{{ route('matriculas.show', $m) }}" class="btn my-0 btn-primary"><i class="fas fa-eye"></i></a>
<a href="{{ route('matriculas.edit', $m) }}" class="btn my-0 btn-warning"><i class="fas fa-edit"></i></a>
<form action="{{ route('matriculas.destroy', $m) }}" method="post" class="d-inline"
    onsubmit="return confirm('Deseja apagar esta matrícula?')">
    @csrf @method('DELETE')
    <button class="btn my-0 btn-danger"><i class="fas fa-trash-alt"></i></button>
</form>