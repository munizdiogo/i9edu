<div class="btn-group">
    <a href="{{ route('restricoes_plano_pagamento.show', $item) }}" class="btn btn-sm my-0 btn-primary mx-1">
        <i class="fas fa-eye"></i>
    </a>

    @can('restricoes_plano_pagamento.edit')
        <a href="{{ route('restricoes_plano_pagamento.edit', $item) }}" class="btn btn-sm my-0 btn-warning mx-1">
            <i class="fas fa-edit"></i>
        </a>
    @endcan

    @can('restricoes_plano_pagamento.delete')
        <button type="button" class="btn btn-danger btn-sm mx-1"
            onclick="confirmarExclusao('{{ route('restricoes_plano_pagamento.destroy', $item->id) }}','{{ $item->id }}')">
            <i class="fas fa-trash-alt"></i>
        </button>
    @endcan
</div>