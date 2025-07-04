@extends('adminlte::page')

@section('title', 'Requerimentos - Solicitações')

@section('content_header')
    <h1 class="m-0 text-dark">Solicitações de Requerimentos</h1>
@endsection

@section('css')
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.4/css/dataTables.bootstrap4.min.css">
@endsection

@section('content')

    <div class="card">
        <div class="card-header">
            <a href="{{ route('requerimentos_solicitacoes.create') }}" class="btn btn-primary">Nova Solicitação</a>
        </div>
        <div class="card-body">
            <table id="requerimentos-table" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Aluno</th>
                        <th>Matricula</th>
                        <th>Polo</th>
                        <th>Assunto</th>
                        <th>Status</th>
                        <th>Data</th>
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
        $(document).ready(function () {
            const table = $('#requerimentos-table').DataTable({
                processing: true,
                serverSide: true,
                // ajax: {
                //     url: $('#requerimentos-table').data('url'),
                //     data: function (d) {
                //         d.search = $('#search').val();
                //     }
                // },
                ajax: '{{ route('requerimentos_solicitacoes.data') }}',
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'aluno', name: 'aluno' },
                    { data: 'matricula', name: 'matricula' },
                    { data: 'polo', name: 'polo' },
                    { data: 'assunto', name: 'assunto' },
                    { data: 'status', name: 'status' },
                    { data: 'created_at', name: 'created_at' },
                    { data: 'actions', name: 'actions', orderable: false, searchable: false }
                ],
                language: {
                    url: "//cdn.datatables.net/plug-ins/1.13.4/i18n/pt-BR.json"
                }
            });

            $('#search').on('keyup', function () {
                table.draw();
            });
        });
    </script>
@endsection

@section('js')
    @include('components.alert-swal-retorno-operacao')
@endsection