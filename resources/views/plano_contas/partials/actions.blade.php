<div class="btn-group" role="group" aria-label="Ações">
    <a href="{{ route('plano-contas.show', $item->id) }}" class="btn btn-sm btn-info" title="Visualizar">
        <i class="fas fa-eye"></i>
    </a>
    <a href="{{ route('plano-contas.edit', $item->id) }}" class="btn btn-sm btn-primary" title="Editar">
        <i class="fas fa-edit"></i>
    </a>
    <form action="{{ route('plano-contas.destroy', $item->id) }}" method="POST" style="display:inline-block;"
        onsubmit="return confirm('Deseja excluir este plano?');">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-sm btn-danger" title="Excluir">
            <i class="fas fa-trash-alt"></i>
        </button>
    </form>
</div>