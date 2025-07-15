{{-- resources/views/documentos/index.blade.php --}}
@extends('adminlte::page')
@section('title', 'Documentos')

@section('content_header')
    <div class="my-4">
        <h1 class="callout callout-info bg-transparent border-none shadow-none p-4 d-inline">Documentos</h1>

        @can('documentos.create')
            <a href="{{ route('documentos.create') }}" class="btn btn-success float-right">
                <i class="fa fa-plus"></i> Novo Documento
            </a>
        @endcan
    </div>
@endsection

@section('css')
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.4/css/dataTables.bootstrap4.min.css">
@endsection


@section('content')
    <div class="card p-4">
        <div class="card-body p-0">
            <table id="documentos-table" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Título</th>
                        <th>Nome de Exibição</th>
                        <th>Status</th>
                        <th>Tipo</th>
                        <th>Template</th>
                        <th>Ações</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
@endsection
@section('js')
    @include('components.alert-swal-retorno-operacao')
    @include('components.alert-swal-excluir')
    <script src="//code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="//cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="//cdn.datatables.net/1.13.4/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(function () {
            $('#documentos-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('documentos.data') }}',
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'titulo', name: 'titulo' },
                    { data: 'nome_exibicao', name: 'nome_exibicao' },
                    { data: 'status', name: 'status' },
                    { data: 'tipo', name: 'tipo' },
                    { data: 'template', name: 'template', orderable: false, searchable: false },
                    { data: 'actions', orderable: false, searchable: false },
                ],
                language: { url: 'https://cdn.datatables.net/plug-ins/1.13.4/i18n/pt-BR.json' }
            });
        });
    </script>
@endsection