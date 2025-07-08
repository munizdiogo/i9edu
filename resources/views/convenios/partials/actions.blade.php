<div class="btn-group">
    <a href="{{ route('convenios.edit', $item->id) }}" class="btn btn-sm btn-primary">Editar</a>
    <a href="{{ route('convenios.show', $item->id) }}" class="btn btn-sm btn-info">Visualizar</a>
    <form action="{{ route('convenios.destroy', $item->id) }}" method="POST" style="display:inline">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-sm btn-danger"
            onclick="return confirm('Excluir convênio?')">Excluir</button>
    </form>
</div>