@extends('adminlte::page')
@section('title', 'Disciplinas')
@section('content_header')
    <h1 class="d-inline">Disciplinas</h1>
    @can('disciplinas.create')
        <a href="{{ route('disciplinas.create') }}" class="btn btn-success float-right">Nova Disciplina</a>
    @endcan
@endsection
@section('css')
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.4/css/dataTables.bootstrap4.min.css">
@endsection
@section('content')
    <div class="card p-4">
        <div class="card-body p-0">
            <table id="tbl-disciplinas" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Descrição</th>
                        <th>Base</th>
                        <th>Etapa</th>
                        <th>Módulo</th>
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
            $('#tbl-disciplinas').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route("disciplinas.data") }}',
                columns: [
                    { data: 'id' }, { data: 'descricao' }, { data: 'base' }, { data: 'etapa' }, { data: 'modulo' }, { data: 'actions', orderable: false, searchable: false }
                ],
                language: { url: '//cdn.datatables.net/plug-ins/1.13.4/i18n/pt-BR.json' }
            });
        });
    </script>
@endsection