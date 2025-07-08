@extends('adminlte::page')
@section('title', 'Convênios')
@section('content_header')
    <h1 class="d-inline">Convênios</h1>
    <a href="{{ route('convenios.create') }}" class="btn btn-success float-right">Novo Convênio</a>
@endsection
@section('css')
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.4/css/dataTables.bootstrap4.min.css">
@endsection
@section('content')
    <a href="{{ route('convenios.create') }}" class="btn btn-success mb-3">Novo Convênio</a>
    <table class="table table-bordered" id="tbl-convenios">
        <thead>
            <tr>
                <th>ID</th>
                <th>Descrição</th>
                <th>Modalidade</th>
                <th>Tipo</th>
                <th>Valor</th>
                <th>Status</th>
                <th>Ações</th>
            </tr>
        </thead>
    </table>
@endsection

@section('js')
    <script src="//code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="//cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="//cdn.datatables.net/1.13.4/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(function () {
            $('#tbl-convenios').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('convenios.data') }}',
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'descricao', name: 'descricao' },
                    { data: 'modalidade', name: 'modalidade' },
                    { data: 'tipo', name: 'tipo' },
                    { data: 'valor', name: 'valor' },
                    { data: 'status', name: 'status' },
                    { data: 'actions', name: 'actions', orderable: false, searchable: false }
                ]
            });
        });
    </script>
@endsection