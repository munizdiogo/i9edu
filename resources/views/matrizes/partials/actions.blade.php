<a href="{{ route('matrizes.show', $matriz) }}" class="btn btn-primary"><i class="fas fa-eye"></i></a>
<a href="{{ route('matrizes.edit', $matriz) }}" class="btn btn-warning"><i class="fas fa-edit"></i></a>
<form action="{{ route('matrizes.destroy', $matriz) }}" method="post" class="d-inline"
    onsubmit="return confirm('Apagar?')">
    @csrf @method('DELETE')
    <button class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
</form>