@extends('adminlte::page')
@section('title', 'Etapas de Períodos Letivos')


@section('content_header')
    <div class="my-4">
        <h1 class="callout callout-info bg-transparent border-none shadow-none  p-4 d-inline">Etapas de Períodos Letivos
        </h1>

        @can('etapas_periodos_letivos.create')
            <a href="{{ route('etapas_periodos_letivos.create') }}" class="btn btn-success float-right">
                <i class="fa fa-plus"></i> Novo Etapa
            </a>
        @endcan
    </div>
@endsection


@section('css')
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/buttons/2.3.6/css/buttons.bootstrap4.min.css">
@endsection
@section('content')
    <div class="card p-4">
        <div class="card-body p-0">
            <table id="tbl-etapas" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Código</th>
                        <th>Descrição</th>
                        <th>Status</th>
                        <th>Período Letivo</th>
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
            $('#tbl-etapas').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route("etapas_periodos_letivos.data") }}',
                columns: [
                    { data: 'id' },
                    { data: 'codigo' },
                    { data: 'descricao' },
                    { data: 'status' },
                    { data: 'periodo' },
                    { data: 'actions', orderable: false, searchable: false }
                ],
                language: { url: 'https://cdn.datatables.net/plug-ins/1.13.4/i18n/pt-BR.json' },
                dom: 'lBfrtip',
                buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
            });
        });
    </script>
@endsection