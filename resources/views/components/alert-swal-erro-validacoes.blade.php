<script>
    function decodeHtml(html) {
        var txt = document.createElement("textarea");
        txt.innerHTML = html;
        return txt.value;
    }
</script>
<script>
    const errors = {!! json_encode($errors->all()) !!};

    let errorMessage = "Foram encontrados os seguintes erros: <br><br>";
    errors.forEach(function (error) {
        errorMessage += `• ${error} <br>`;
    });

    var mensagemCorrigida = decodeHtml(errorMessage);
    Swal.fire({
        icon: 'error',
        title: 'Erro!',
        html: errorMessage,
        confirmButtonText: 'OK'
    });
</script>