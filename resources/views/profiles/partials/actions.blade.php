<a href="{{ route('profiles.show', $p) }}" class="btn my-0 btn-primary"><i class="fas fa-eye"></i></a>
<a href="{{ route('profiles.edit', $p) }}" class="btn  my-0 btn-warning"><i class="fas fa-edit"></i></a>
<form action="{{ route('profiles.destroy', $p) }}" method="post" class="d-inline"
    onsubmit="return confirm('Confirma exclusão?')">
    @csrf @method('DELETE')
    <button class="btn  my-0 btn-danger"><i class="fas fa-trash-alt"></i></button>
</form>