<div class="btn-group">
    <a href="{{ route('restricoes_plano_pagamento.edit', $item->id) }}" class="btn btn-sm btn-warning" title="Editar">
        <i class="fa fa-edit"></i>
    </a>
    <form action="{{ route('restricoes_plano_pagamento.destroy', $item->id) }}" method="POST" style="display:inline"
        onsubmit="return confirm('Deseja remover esta restrição?');">
        @csrf
        @method('DELETE')
        <button class="btn btn-sm btn-danger" type="submit" title="Remover">
            <i class="fa fa-trash"></i>
        </button>
    </form>
</div>