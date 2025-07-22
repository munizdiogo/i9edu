<div class="modal fade" id="modalCurso" tabindex="-1" role="dialog" aria-labelledby="modalCursoLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="{{ route('matriz_captacao.cursos.store', $matriz) }}" method="POST">
            @csrf
            <input type="hidden" name="id_matriz_captacao" value="{{ $matriz->id }}">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalCursoLabel">Adicionar Curso</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="id_curso">Curso*</label>
                        <select name="id_curso" id="id_curso" class="form-control select2bs4" required>
                            <option value="">-- selecione --</option>
                            @foreach(\App\Models\Curso::pluck('nome', 'id') as $id => $nome)
                                <option value="{{ $id }}">{{ $nome }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="status_curso">Status*</label>
                        <select name="status" id="status_curso" class="form-control">
                            <option value="Ativo">Ativo</option>
                            <option value="Inativo">Inativo</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="modalidade">Modalidade*</label>
                        <select name="modalidade" id="modalidade" class="form-control">
                            <option value="Presencial">Presencial</option>
                            <option value="EaD">EaD</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="quantidade_vagas_curso">Quantidade de Vagas</label>
                        <input type="number" name="quantidade_vagas" id="quantidade_vagas_curso" class="form-control"
                            value="0" min="0">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Adicionar Curso</button>
                </div>
            </div>
        </form>
    </div>
</div>