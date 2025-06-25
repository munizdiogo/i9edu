<div class="btn-group" role="group" aria-label="Ações">
    {{-- Editar parcela --}}
    <a href="#" class="btn btn-sm btn-primary btn-editar-parcela mx-1" data-toggle="modal" data-target="#modalParcela"
        title="Editar">
        <i class="fas fa-edit"></i>
    </a>

    {{-- Excluir parcela --}}
    <form action="{{ route('planos.parcelas.destroy', [$parcela->id]) }}" method="POST" style="display:inline;"
        onsubmit="return confirm('Deseja mesmo excluir esta parcela?');">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-sm btn-danger mx-1" title="Excluir">
            <i class="fas fa-trash-alt"></i>
        </button>
    </form>
</div>