@extends('adminlte::page')

@section('title', 'Matrículas')

@section('content_header')
    <h1 class="d-inline">Matrículas</h1>
    <a href="{{ route('matriculas.create') }}" class="btn btn-success float-right">Nova Matrícula</a>
@endsection

@section('css')
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/buttons/2.3.6/css/buttons.bootstrap4.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/responsive/2.4.1/css/responsive.bootstrap4.min.css">
@endsection

@section('content')
    <div class="card p-4">
        <div class="card-body p-0">
            <table id="matriculas-table" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Aluno</th>
                        <th>Turma</th>
                        <th>Data</th>
                        <th>Status</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </div>
@endsection

@section('js')
    <script src="//code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="//cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="//cdn.datatables.net/1.13.4/js/dataTables.bootstrap4.min.js"></script>
    <script src="//cdn.datatables.net/responsive/2.4.1/js/dataTables.responsive.min.js"></script>
    <script src="//cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js"></script>
    <script src="//cdn.datatables.net/buttons/2.3.6/js/buttons.bootstrap4.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.68/pdfmake.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.68/vfs_fonts.js"></script>
    <script src="//cdn.datatables.net/buttons/2.3.6/js/buttons.html5.min.js"></script>
    <script src="//cdn.datatables.net/buttons/2.3.6/js/buttons.print.min.js"></script>
    <script src="//cdn.datatables.net/buttons/2.3.6/js/buttons.colVis.min.js"></script>

    <script>
        $(function () {
            $('#matriculas-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route("matriculas.data") }}',
                columns: [
                    { data: 'id' },
                    { data: 'aluno' },
                    { data: 'turma' },
                    { data: 'data_matricula' },
                    { data: 'status' },
                    { data: 'actions', orderable: false, searchable: false }
                ],
                dom: 'lBfrtip',
                buttons: ['copy', 'csv', 'excel', 'pdf', 'print', 'colvis'],
                responsive: true,
                autoWidth: false,
                language: { url: 'https://cdn.datatables.net/plug-ins/1.13.4/i18n/pt-BR.json' },
                pageLength: 10,
                lengthMenu: [[10, 25, 50, -1], ['10', '25', '50', 'Todos']]
            });
        });
    </script>
@endsection