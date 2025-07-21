<div class="modal fade" id="modalCurso" tabindex="-1" role="dialog" aria-labelledby="modalCursoLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="{{ route('matriz_captacao.cursos.store') }}" method="POST">
            @csrf
            <input type="hidden" name="matriz_captacao_id" value="{{ $matriz->id ?? ''}}">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalCursoLabel">Adicionar Curso à Matriz</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar"><span
                            aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Curso*</label>
                        <select name="id_curso" class="form-control select2bs4" required>
                            <option value=""></option>
                            @foreach(App\Models\Curso::pluck('nome', 'id') as $id => $nome)
                                <option value="{{ $id }}">{{ $nome }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Modalidade*</label>
                        <select name="modalidade" class="form-control select2bs4">
                            <option value="Presencial">Presencial</option>
                            <option value="EaD">EaD</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Quantidade de Vagas</label>
                        <input type="number" name="quantidade_vagas" class="form-control" value="0" min="0">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Adicionar</button>
                </div>
            </div>
        </form>
    </div>
</div>