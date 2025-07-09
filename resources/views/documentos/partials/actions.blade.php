{{-- resources/views/documentos/partials/actions.blade.php --}}
<a href="{{ route('documentos.show', $item->id) }}" class="btn btn-info btn-sm">Ver</a>
<a href="{{ route('documentos.edit', $item->id) }}" class="btn btn-warning btn-sm">Editar</a>
<form action="{{ route('documentos.destroy', $item->id) }}" method="POST" style="display:inline-block;"
    onsubmit="return confirm('Tem certeza?');">
    @csrf
    @method('DELETE')
    <button class="btn btn-danger btn-sm">Excluir</button>
</form>