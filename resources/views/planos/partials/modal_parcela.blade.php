<div class="modal fade" id="modalParcela" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <form id="formParcela" method="post">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Parcela</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="_method" id="metodoParcela" value="POST">
                    <div class="form-group">
                        <label>Descrição</label>
                        <input name="descricao" id="descricaoParcela" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Qtd. Parcelas</label>
                        <input name="quantidade_parcelas" id="qtdParcela" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Valor</label>
                        <input name="valor" id="valorParcela" type="number" step="0.01" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Cálculo Vencimento</label>
                        <select name="calculo_vencimento" id="calcParcela" class="form-control">
                            <option value="FIXO">Fixo</option>
                            <option value="DIAS_UTIL">Dias Úteis</option>
                            <option value="DINAMICO">Dinâmico</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Tipo Parcela</label>
                        <select name="tipo_parcela" id="tipoParcela" class="form-control">
                            <option value="NORMAL">Normal</option>
                            <option value="MATRICULA">Matrícula</option>
                            <option value="DESCONTO">Desconto</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </div>
            </div>
        </form>
    </div>
</div>