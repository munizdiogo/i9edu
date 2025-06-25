@extends('adminlte::page')
@section('title','Editar Plano')
@section('content')
<form action="{{ route('planos_pagamento.update',$planos_pagamento) }}" method="post">
  @csrf @method('PUT')
  @include('planos.form')

  <div class="card p-2">
    <ul class="nav nav-tabs mt-3">
    <li class="nav-item"><a class="nav-link active" href="#tab-parcelas" data-toggle="tab">Parcelas</a></li>
    <li class="nav-item"><a class="nav-link" href="#tab-cursos" data-toggle="tab">Cursos</a></li>
    <li class="nav-item"><a class="nav-link" href="#tab-polos" data-toggle="tab">Polos</a></li>
  </ul>
  <div class="tab-content p-3">
    <div id="tab-parcelas" class="tab-pane active">
      <button type="button" class="btn btn-sm btn-primary mb-2" data-toggle="modal" data-target="#modalParcela"> <i class="fas fa-plus px-2"></i> Adicionar Parcela</button>
      <table id="tbl-parcelas" class="table table-striped">
        <thead>
          <tr>
            <th>Descrição</th>
            <th>Qtd</th>
            <th>Valor</th>
            <th>Ações</th>
          </tr>
        </thead>
        <tbody></tbody>
      </table>
    </div>
    <div id="tab-cursos" class="tab-pane">
      @foreach($cursos as $id=>$nome)
        <div class="form-check">
          <input type="checkbox" name="cursos[]" value="{{ $id }}"
            {{ in_array($id,$planos_pagamento->cursos->pluck('id')->toArray())?'checked':'' }}
            class="form-check-input">
          <label class="form-check-label">{{ $nome }}</label>
        </div>
      @endforeach
    </div>
    <div id="tab-polos" class="tab-pane">
      @foreach($polos as $id=>$nome)
        <div class="form-check">
          <input type="checkbox" name="polos[]" value="{{ $id }}"
            {{ in_array($id,$planos_pagamento->polos->pluck('id')->toArray())?'checked':'' }}
            class="form-check-input">
          <label class="form-check-label">{{ $nome }}</label>
        </div>
      @endforeach
    </div>
  </div>
  </div>

  <div class="mt-3 text-right">
    <a href="{{ route('planos_pagamento.index') }}" class="btn btn-lg btn-default">Voltar</a>
    <button class="btn btn-lg btn-success">Salvar</button>
  </div>
</form>

{{-- Modal de Parcela --}}
<div class="modal fade" id="modalParcela">
  <div class="modal-dialog">
    <form action="{{ route('planos.parcelas.store',$planos_pagamento) }}" method="post">
      @csrf
      <div class="modal-content">
        <div class="modal-header"><h5>Nova Parcela</h5></div>
        <div class="modal-body">
          <div class="form-group">
            <label>Descrição</label>
            <input name="descricao" class="form-control" required>
          </div>
          <div class="form-group">
            <label>Qtd. Parcelas (ex 1-6,12)</label>
            <input name="quantidade_parcelas" class="form-control" required>
          </div>
          <div class="form-group">
            <label>Valor</label>
            <input name="valor" type="number" step="0.01" class="form-control" required>
          </div>
          <div class="form-group">
            <label>Cálculo Vencimento</label>
            <select name="calculo_vencimento" class="form-control">
              <option value="FIXO">Fixo</option>
              <option value="DIAS_UTIL">Dias Úteis</option>
              <option value="DINAMICO">Dinâmico</option>
            </select>
          </div>
          <div class="form-group">
            <label>Tipo Parcela</label>
            <select name="tipo_parcela" class="form-control">
              <option value="NORMAL">Normal</option>
              <option value="MATRICULA">Matrícula</option>
              <option value="DESCONTO">Desconto</option>
            </select>
          </div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-default" data-dismiss="modal">Cancelar</button>
          <button class="btn btn-primary">Adicionar</button>
        </div>
      </div>
    </form>
  </div>
</div>
@endsection

@section('js')
    <script src="//code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="//cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="//cdn.datatables.net/1.13.4/js/dataTables.bootstrap4.min.js"></script>
    <script src="//cdn.datatables.net/responsive/2.4.1/js/dataTables.responsive.min.js"></script>
    <script src="//cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js"></script>
    <script src="//cdn.datatables.net/buttons/2.3.6/js/buttons.bootstrap4.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.68/pdfmake.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.68/vfs_fonts.js"></script>
    <script src="//cdn.datatables.net/buttons/2.3.6/js/buttons.html5.min.js"></script>
    <script src="//cdn.datatables.net/buttons/2.3.6/js/buttons.print.min.js"></script>
    <script src="//cdn.datatables.net/buttons/2.3.6/js/buttons.colVis.min.js"></script>
<script>
$(function(){
  // inicializar DataTable
  let tbl = $('#tbl-parcelas').DataTable({
    processing:true, 
    serverSide:true,
    ajax:'{{ route("planos.parcelas.data", $planos_pagamento) }}',
    columns:[
      {data:'descricao'}, {data:'quantidade_parcelas'},
      {data:'valor'}, {data:'actions',orderable:false}
    ],
    dom: 'lfrtip',
    buttons: ['copy', 'csv', 'excel', 'pdf', 'print', 'colvis'],
    responsive: true,
    autoWidth: false,
    language: { url: 'https://cdn.datatables.net/plug-ins/1.13.4/i18n/pt-BR.json' },
    pageLength: 10,
    lengthMenu: [[10, 25, 50, -1], ['10', '25', '50', 'Todos']]
});

  // Ao clicar em “Adicionar Parcela”
  $('#modalParcela').on('show.bs.modal', function(e){
    let button = $(e.relatedTarget);
    let isEdit = button.data('edit');  // atributo data-edit="true" se for editar
    let form = $('#formParcela');
    if(!isEdit){
      // criação
      form.attr('action','{{ route("planos.parcelas.store",$planos_pagamento) }}');
      $('#metodoParcela').val('POST');
      form[0].reset();
    }
  });

  // Delegar clique no botão de editar dentro do DataTable
  $('#tbl-parcelas').on('click','a.btn-editar-parcela', function(){
    let tr = $(this).closest('tr');
    let data = tbl.row(tr).data();
    // preenche o modal
    $('#descricaoParcela').val(data.descricao);
    $('#qtdParcela').val(data.quantidade_parcelas);
    $('#valorParcela').val(data.valor.replace('.','').replace(',','.'));
    $('#calcParcela').val(data.calculo_vencimento);
    $('#tipoParcela').val(data.tipo_parcela);
    // ajusta action e method
    let urlEdit = '/parcelas_plano_pagamento/'+data.id; // ajuste se sua rota for diferente
    $('#formParcela').attr('action',urlEdit);
    $('#metodoParcela').val('PUT');
    $('#modalParcela').modal('show');
  });
});
</script>
@endsection
