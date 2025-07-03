@extends('adminlte::page')
@section('title', 'Assuntos de Requerimento')

@section('content_header')
    <h1>Assuntos de Requerimento</h1>
@endsection
@section('css')
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.4/css/dataTables.bootstrap4.min.css">
@endsection

@section('content')
    <a href="{{ route('requerimentos_assuntos.create') }}" class="btn btn-success mb-3">Novo Assunto</a>
    <table id="tbl-assuntos" class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Código</th>
                <th>Descrição</th>
                <th>Departamento</th>
                <th>Tipo</th>
                <th>Status</th>
                <th width="120">Ações</th>
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
            $('#tbl-assuntos').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('requerimentos_assuntos.data') }}',
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'codigo', name: 'codigo' },
                    { data: 'descricao', name: 'descricao' },
                    { data: 'departamento', name: 'departamento' },
                    { data: 'tipo_assunto', name: 'tipo_assunto' },
                    { data: 'status', name: 'status' },
                    { data: 'acoes', name: 'acoes', orderable: false, searchable: false },
                ]
            });
        });
    </script>
@endsection