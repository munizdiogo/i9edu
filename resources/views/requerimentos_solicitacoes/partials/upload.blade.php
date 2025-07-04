<div class="form-group">
    <label for="anexos">Anexar Arquivos</label>

    <div class="dropzone dz-clickable" id="dropzone-anexos">
        <div class="dz-message">
            Arraste e solte os arquivos aqui ou clique para selecionar.
        </div>
    </div>

    <small class="form-text text-muted">Tamanho máximo por arquivo: 5MB</small>
</div>

@push('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/min/dropzone.min.css" />
@endpush

@push('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/min/dropzone.min.js"></script>
    <script>
        Dropzone.autoDiscover = false;

        var anexosDropzone = new Dropzone("#dropzone-anexos", {
            url: "{{ route('requerimentos_solicitacoes.upload') }}",
            paramName: "anexo",
            maxFilesize: 5, // MB
            addRemoveLinks: true,
            dictDefaultMessage: "Arraste arquivos aqui ou clique para fazer upload",
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            init: function () {
                this.on("success", function (file, response) {
                    // Cria um input hidden com o nome do arquivo
                    $('<input>').attr({
                        type: 'hidden',
                        name: 'anexos[]',
                        value: response.path
                    }).appendTo('form');
                });

                this.on("removedfile", function (file) {
                    // TODO: implementar remoção opcional
                });
            }
        });
    </script>
@endpush