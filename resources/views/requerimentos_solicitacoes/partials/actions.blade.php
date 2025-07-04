<div class="btn-group">
    <a href="{{ route('requerimentos_solicitacoes.show', $item) }}" class="btn my-0 btn-primary"><i
            class="fas fa-eye"></i></a>
    <a href="{{ route('requerimentos_solicitacoes.edit', $item) }}" class="btn btn-sm btn-warning">Editar</a>
    <button class="btn btn-sm btn-danger"
        onclick="if(confirm('Tem certeza?')) { deletar('{{ route('requerimentos_solicitacoes.destroy', $item) }}') }">Excluir</button>
</div>

<script>
    function deletar(url) {
        fetch(url, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        })
            .then(() => location.reload());
    }
</script>