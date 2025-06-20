@extends('adminlte::page')
@section('title', 'Módulos')
@section('content_header')
    <h1>Módulos</h1>
    <a href="{{ route('modulos.create') }}" class="btn btn-success float-right">Novo Módulo</a>
@endsection
@section('css')
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.4/css/dataTables.bootstrap4.min.css">
@endsection
@section('content')
    <div class="card">
        <div class="card-body p-0">
            <table id="tbl-modulos" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Código</th>
                        <th>Descrição</th>
                        <th>Status</th>
                        <th>Próx.</th>
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
            $('#tbl-modulos').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route("modulos.data") }}',
                columns: [
                    { data: 'id' },
                    { data: 'codigo' },
                    { data: 'descricao' },
                    { data: 'status' },
                    { data: 'prox' },
                    { data: 'actions', orderable: false, searchable: false }
                ],
                language: { url: '//cdn.datatables.net/plug-ins/1.13.4/i18n/pt-BR.json' }
            });
        });
    </script>
@endsection