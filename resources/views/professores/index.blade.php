@extends('adminlte::page')
@section('title', 'Professores')
@section('content_header')
    <h1 class="d-inline">Professores</h1>
    <a href="{{ route('professores.create') }}" class="btn btn-success float-right">Novo Professor</a>
@endsection
@section('css')
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.4/css/dataTables.bootstrap4.min.css">
@endsection
@section('content')
    <div class="card p-4">
        <div class="card-body p-0">
            <table id="tbl-professores" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Funcionário</th>
                        <th>Tipo Docente</th>
                        <th>Situação</th>
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
            $('#tbl-professores').DataTable({
                processing: true, serverSide: true,
                ajax: '{{ route("professores.data") }}',
                columns: [
                    { data: 'id' }, { data: 'funcionario' }, { data: 'tipo_docente' }, { data: 'situacao_docente' }, { data: 'actions', orderable: false, searchable: false }
                ],
                language: { url: 'https://cdn.datatables.net/plug-ins/1.13.4/i18n/pt-BR.json' }
            });
        });
    </script>
@endsection