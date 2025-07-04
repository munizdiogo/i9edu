<!-- Dropzone CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.css" />

<div class="form-group">
    <label for="id_aluno">Aluno</label>
    <select id="id_aluno" name="id_aluno" class="form-control select2" required>
        <option value="">Selecione o aluno</option>
        @foreach($alunos as $aluno)
            <option value="{{ $aluno->id }}">{{ $aluno->perfil->nome }}</option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <label for="id_matricula">Matrícula</label>
    <select id="id_matricula" name="id_matricula" class="form-control" required>
        <option value="">Selecione a matrícula</option>
    </select>
</div>
<div class="form-group">
    <label for="disciplinas">Disciplinas</label>
    <select id="disciplinas" name="disciplinas[]" class="form-control select2" multiple>
        <!-- Carregado dinamicamente -->
    </select>
</div>
<div class="form-group">
    <label>Polo</label>
    <select name="id_polo" class="form-control select2 p-0" required>
        <option value="">Selecione</option>
        @foreach($polos as $polo)
            <option value="{{ $polo->id }}" {{ old('id_polo', $requerimento->id_polo ?? '') == $polo->id ? 'selected' : '' }}>
                {{ $polo->nome }}
            </option>
        @endforeach
    </select>
</div>
<div class="form-group">
    <label>Assunto</label>
    <select name="id_assunto" class="form-control select2" required>
        <option value="">Selecione</option>
        @foreach($assuntos as $assunto)
            <option value="{{ $assunto->id }}" {{ old('id_assunto', $requerimento->id_assunto ?? '') == $assunto->id ? 'selected' : '' }}>{{ $assunto->descricao }}</option>
        @endforeach
    </select>
</div>
<div class="form-group">
    <label>Observação</label>
    <textarea name="observacao" class="form-control">{{ old('observacao', $requerimento->observacao ?? '') }}</textarea>
</div>
<input type="text" name="id_status" id="id_status" value="1" hidden>
@include('requerimentos_solicitacoes.partials.upload')
{{-- <div class="col-md-6">
    <div class="form-group">
        <label>Anexos</label>
        <input type="file" name="anexos[]" multiple class="form-control">
    </div>
</div> --}}



@push('js')
    <script>
        $(document).ready(function () {
            // Aluno selecionado → Carrega Matrículas
            $('#id_aluno').on('change', function () {
                let alunoId = $(this).val();
                console.log(alunoId)
                $('#id_matricula').empty().append('<option value="">Carregando...</option>');
                $('#disciplinas').empty();

                if (alunoId) {
                    $.ajax({
                        url: `/api/alunos/${alunoId}/matriculas`,
                        type: 'GET',
                        success: function (data) {
                            $('#id_matricula').empty().append('<option value="">Selecione a matrícula</option>');
                            $.each(data, function (index, item) {
                                $('#id_matricula').append(`<option value="${item.id}">${item.descricao}</option>`);
                            });
                        },
                        error: function () {
                            alert('Erro ao carregar as matrículas.');
                        }
                    });
                }
            });

            // Matrícula selecionada → Carrega Disciplinas
            $('#id_matricula').on('change', function () {
                let matriculaId = $(this).val();
                $('#disciplinas').empty();

                if (matriculaId) {
                    $.ajax({
                        url: `/api/matriculas/${matriculaId}/disciplinas`,
                        type: 'GET',
                        success: function (data) {
                            $.each(data, function (index, item) {
                                $('#disciplinas').append(`<option value="${item.id}">${item.descricao}</option>`);
                            });
                        },
                        error: function () {
                            alert('Erro ao carregar as disciplinas.');
                        }
                    });
                }
            });

            // Inicializa o select2 (se ainda não estiver usando)
            $('.select2').select2({ width: '100%' });
        });
    </script>



    <!-- Dropzone JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/min/dropzone.min.js"></script>
@endpush