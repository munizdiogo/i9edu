@extends('adminlte::page')
@section('title', 'Grupo de Contas')
@section('css')
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.4/css/dataTables.bootstrap4.min.css">
@endsection
@section('content_header')
<h1>Grupo de Contas</h1>
@stop
@section('content')
<a href="{{ route('grupo-contas.create') }}" class="btn btn-success mb-3">Novo Grupo</a>
<div class="card">
    <div class="card-body">
        <table class="table table-bordered" id="grupoContasTable">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Descrição</th>
                    <th>Sigla</th>
                    <th>Ordem</th>
                    <th>Nível</th>
                    <th>Tipo Resultado</th>
                    <th>Operação</th>
                    <th>Status</th>
                    <th>Ações</th>
                </tr>
            </thead>
        </table>
    </div>
</div>
@stop
@section('js')
<script src="//code.jquery.com/jquery-3.7.0.min.js"></script>
<script src="//cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="//cdn.datatables.net/1.13.4/js/dataTables.bootstrap4.min.js"></script>
<script>
    $(function () {
        $('#grupoContasTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{ route('grupo-contas.data') }}',
            columns: [
                { data: 'id', name: 'id' },
                { data: 'descricao', name: 'descricao' },
                { data: 'sigla', name: 'sigla' },
                { data: 'ordem', name: 'ordem' },
                { data: 'nivel', name: 'nivel' },
                { data: 'tipo_resultado', name: 'tipo_resultado' },
                { data: 'operacao', name: 'operacao' },
                { data: 'status', name: 'status' },
                { data: 'actions', name: 'actions', orderable: false, searchable: false }
            ]
        });
    });
</script>
@stop