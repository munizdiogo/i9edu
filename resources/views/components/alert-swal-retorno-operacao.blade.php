<script>
    function decodeHtml(html) {
        var txt = document.createElement("textarea");
        txt.innerHTML = html;
        return txt.value;
    }
</script>
@if (session('success'))
    <script>
        var mensagemCorrigida = decodeHtml('{{ session('success') }}');
        Swal.fire({
            icon: 'success',
            title: 'Sucesso!',
            text: mensagemCorrigida,
            confirmButtonText: 'OK'
        });
    </script>
@endif

@if (session('error'))
    <script>
        var mensagemCorrigida = decodeHtml('{{ session('error') }}');
        Swal.fire({
            icon: 'error',
            title: 'Erro!',
            text: mensagemCorrigida,
            confirmButtonText: 'OK'
        });
    </script>
@endif