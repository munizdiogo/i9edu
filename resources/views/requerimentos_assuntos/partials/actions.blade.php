<div class="btn-group">
    <a href="{{ route('requerimentos_assuntos.edit', $item) }}" class="btn btn-sm btn-warning">Editar</a>
    <button class="btn btn-sm btn-danger"
        onclick="if(confirm('Tem certeza?')) { deletar('{{ route('requerimentos_assuntos.destroy', $item) }}') }">Excluir</button>
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