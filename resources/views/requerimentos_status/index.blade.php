@extends('adminlte::page')
@section('title', 'Status dos Requerimentos')

@section('content_header')
    <h1 class="d-inline">Status dos Requerimentos</h1>
    <a href="{{ route('requerimentos-status.create') }}" class="btn btn-success float-right">Novo Status Requerimento</a>
@endsection

@section('css')
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.4/css/dataTables.bootstrap4.min.css">
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <a href="{{ route('requerimentos-status.create') }}" class="btn btn-primary">Novo Status</a>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped" id="datatable">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Descrição</th>
                        <th>Status</th>
                        <th>Cor</th>
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
            $('#datatable').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('requerimentos-status.data') }}',
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'descricao', name: 'descricao' },
                    { data: 'status', name: 'status' },
                    { data: 'cor', name: 'cor' },
                    { data: 'acoes', name: 'acoes', orderable: false, searchable: false },
                ],
                language: { url: 'https://cdn.datatables.net/plug-ins/1.13.4/i18n/pt-BR.json' },
            });
        });
    </script>

    @include('components.alert-swal-retorno-operacao')
@endsection