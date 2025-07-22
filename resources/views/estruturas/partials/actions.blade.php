@can('estruturas.edit')
    <a href="{{ route('estruturas.edit', $estrutura) }}" class="btn btn-sm btn-warning" title="Editar">
        <i class="fa fa-edit"></i>
    </a>
@endcan

@can('estruturas.delete')
    <button type="button" class="btn btn-danger btn-sm"
        onclick="confirmarExclusao('{{ route('estruturas.destroy', $estrutura->id) }}','{{ $estrutura->id }}')">
        <i class="fas fa-trash-alt"></i>
    </button>
@endcan

<form action="{{ route('estruturas.selecionar') }}" method="POST" class="d-inline">
    @csrf
    <input type="hidden" name="id_estrutura" value="{{ $estrutura->id }}">
    <button class="btn btn-sm btn-info" title="Selecionar Estrutura">
        <i class="fa fa-check-circle"></i>
    </button>
</form>