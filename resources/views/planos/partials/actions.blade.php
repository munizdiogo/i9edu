@can('planos_pagamento.edit')
    <a href="{{ route('planos_pagamento.edit', $item) }}" class="btn btn-sm my-0 btn-warning"><i
            class="fas fa-edit"></i></a>
@endcan

@can('planos_pagamento.delete')
    <button type="button" class="btn btn-danger btn-sm"
        onclick="confirmarExclusao('{{ route('planos_pagamento.destroy', $item->id) }}','{{ $item->id }}')">
        <i class="fas fa-trash-alt"></i>
    </button>
@endcan