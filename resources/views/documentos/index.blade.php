{{-- resources/views/documentos/index.blade.php --}}
@extends('adminlte::page')
@section('title', 'Documentos')
@section('css')
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/buttons/2.3.6/css/buttons.bootstrap4.min.css">
@endsection
@section('content')
    <a href="{{ route('documentos.create') }}" class="btn btn-success mb-2">Novo Documento</a>
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
@endsection
@section('js')
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
                language: { url: '//cdn.datatables.net/plug-ins/1.11.3/i18n/pt_br.json' }
            });
        });
    </script>
@endsection