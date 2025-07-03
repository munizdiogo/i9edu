@extends('adminlte::page')
@section('title', 'Requerimentos por Departamento')

@section('content_header')
    <h1 class="d-inline">Departamentos</h1>
    <a href="{{ route('requerimentos_departamentos.create') }}" class="btn btn-success float-right">Novo Departamento</a>
@endsection
@section('css')
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.4/css/dataTables.bootstrap4.min.css">
@endsection

@section('content')

    <div class="card p-4">
        <div class="card-body p-0">
            <table id="tbl-requerimentos" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Descrição</th>
                        <th>Tipo</th>
                        <th>Status</th>
                        <th>Ações</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
@endsection

@section('js')
    <script src="//code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="//cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="//cdn.datatables.net/1.13.4/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(function () {
            $('#tbl-requerimentos').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('requerimentos_departamentos.data') }}',
                columns: [
                    { data: 'descricao', name: 'descricao' },
                    { data: 'tipo', name: 'tipo' },
                    { data: 'status', name: 'status' },
                    { data: 'actions', name: 'actions', orderable: false, searchable: false }
                ],
                language: { url: 'https://cdn.datatables.net/plug-ins/1.13.4/i18n/pt-BR.json' },
            });
        });
    </script>
@endsection