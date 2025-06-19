<a href="{{ route('editais.show', $e) }}" class="btn my-0 btn-primary"><i class="fas fa-eye"></i></a>
<a href="{{ route('editais.edit', $e) }}" class="btn my-0 btn-warning"><i class="fas fa-edit"></i></a>
<form action="{{ route('editais.destroy', $e) }}" method="post" class="d-inline"
    onsubmit="return confirm('Apagar este edital?')">
    @csrf @method('DELETE')
    <button class="btn my-0 btn-danger"><i class="fas fa-trash-alt"></i></button>
</form>