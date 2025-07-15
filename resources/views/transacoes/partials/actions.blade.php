<div class="btn-group">
    <a href="{{ route('transacoes.show', $item->id) }}" class="btn btn-sm btn-info" title="Ver"><i
            class="fa fa-eye"></i></a>
    <a href="{{ route('transacoes.edit', $item->id) }}" class="btn btn-sm btn-primary" title="Editar"><i
            class="fa fa-edit"></i></a>
    <form action="{{ route('transacoes.destroy', $item->id) }}" method="POST" style="display:inline"
        onsubmit="return confirm('Tem certeza?')">
        @csrf
        @method('DELETE')
        <button class="btn btn-sm btn-danger" title="Excluir"><i class="fa fa-trash"></i></button>
    </form>
</div>