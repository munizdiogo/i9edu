<div class="btn-group" role="group" aria-label="Ações">
    {{-- Editar parcela --}}
    <a href="#" class="btn btn-sm btn-primary btn-editar-parcela mx-1" data-toggle="modal" data-target="#modalParcela"
        title="Editar">
        <i class="fas fa-edit"></i>
    </a>

    {{-- Excluir parcela --}}
    <button type="button" class="btn btn-danger btn-sm"
        onclick="confirmarExclusao('{{ route('planos.parcelas.destroy', $parcela->id) }}','{{ $parcela->id }}')">
        <i class="fas fa-trash-alt"></i>
    </button>
</div>