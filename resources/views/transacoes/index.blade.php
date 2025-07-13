@extends('adminlte::page')
@section('title', 'Transações')


@section('css')
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.4/css/dataTables.bootstrap4.min.css">
@endsection


@section('content_header')
<h1>Transações</h1>
@stop

@section('content')
    <div class="mb-3">
        <a href="{{ route('transacoes.create') }}" class="btn btn-success"><i class="fa fa-plus"></i> Nova Transação</a>
    </div>

    <table id="transacoes-table" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Aluno</th>
                <th>Pagador</th>
                <th>Descrição</th>
                <th>Competência</th>
                <th>Vencimento</th>
                <th>Valor</th>
                <th>Pago</th>
                <th>Situação</th>
                <th>Status</th>
                <th width="120">Ações</th>
            </tr>
        </thead>
    </table>
@endsection

@push('js')
    <script src="//code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="//cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="//cdn.datatables.net/1.13.4/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(function () {
            $('#transacoes-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('transacoes.data') }}',
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'aluno', name: 'aluno' },
                    { data: 'pagador', name: 'pagador' },
                    { data: 'descricao', name: 'descricao' },
                    { data: 'competencia', name: 'competencia' },
                    { data: 'data_vencimento', name: 'data_vencimento' },
                    { data: 'valor', name: 'valor', className: 'text-right' },
                    { data: 'valor_pago', name: 'valor_pago', className: 'text-right' },
                    { data: 'situacao', name: 'situacao' },
                    { data: 'status', name: 'status' },
                    { data: 'actions', name: 'actions', orderable: false, searchable: false },
                ],
                order: [[5, 'desc']]
            });
        });
    </script>
@endpush