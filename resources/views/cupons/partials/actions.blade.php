<a href="{{ route('cupons.show', $item->id) }}" class="btn btn-sm btn-info">Ver</a>
@can('cupons.edit')
    <a href="{{ route('cupons.edit', $item->id) }}" class="btn btn-sm btn-primary">Editar</a>
@endcan
@can('cupons.delete')
    <form action="{{ route('cupons.destroy', $item->id) }}" method="POST" style="display:inline-block;"
        onsubmit="return confirm('Deseja realmente excluir?')">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-sm btn-danger">Excluir</button>
    </form>
@endcan