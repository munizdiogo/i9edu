<a href="{{ route('disciplinas_base.show', $d) }}" class="btn my-0 btn-primary"><i class="fas fa-eye"></i></a>
<a href="{{ route('disciplinas_base.edit', $d) }}" class="btn my-0 btn-warning"><i class="fas fa-edit"></i></a>
<form action="{{ route('disciplinas_base.destroy', $d) }}" method="post" class="d-inline"
    onsubmit="return confirm('Apagar?')">
    @csrf @method('DELETE')
    <button class="btn my-0 btn-danger"><i class="fas fa-trash-alt"></i></button>
</form>