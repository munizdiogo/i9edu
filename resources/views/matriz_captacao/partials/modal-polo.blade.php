<div class="modal fade" id="modalPolo" tabindex="-1" role="dialog" aria-labelledby="modalPoloLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="{{ route('matriz_captacao.polos.store', $matriz->id) }}" method="POST">
            @csrf
            <input type="hidden" name="id_matriz_captacao" value="{{ $matriz->id }}">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalPoloLabel">Adicionar Polo à Matriz</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar"><span
                            aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Polo*</label>
                        <select name="id_polo" class="form-control select2bs4" required>
                            <option value=""></option>
                            @foreach(App\Models\Polo::pluck('descricao', 'id') as $id => $desc)
                                <option value="{{ $id }}">{{ $desc }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <select name="status" class="form-control select2bs4">
                            <option value="Ativo">Ativo</option>
                            <option value="Inativo">Inativo</option>
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