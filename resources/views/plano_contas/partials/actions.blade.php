<a href="{{ route('plano-contas.show', $item->id) }}" class="btn btn-sm btn-info" title="Visualizar">
    <i class="fas fa-eye"></i>
</a>


@can('plano-contas.edit')
    <a href="{{ route('plano-contas.edit', $item) }}" class="btn btn-sm my-0 btn-warning"><i class="fas fa-edit"></i></a>
@endcan

@can('plano-contas.delete')
    <button type="button" class="btn btn-danger btn-sm"
        onclick="confirmarExclusao('{{ route('plano-contas.destroy', $item->id) }}','{{ $item->id }}')">
        <i class="fas fa-trash-alt"></i>
    </button>
@endcan