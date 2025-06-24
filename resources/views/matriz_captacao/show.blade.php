@extends('adminlte::page')


@section('content_header')
    @section('css')
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap4.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.6/css/buttons.bootstrap4.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.4.1/css/responsive.bootstrap4.min.css">
    @endsection

    <h1>
        Detalhes da Matriz Captação #{{ $matriz->id }}
    </h1>
@endsection

@section('content')

    <form method="POST" action="#">
        @csrf

        <div class="card p-4">
            <fieldset disabled>@include('matriz_captacao.partials.form')</fieldset>
        </div>


        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-header bg-primary d-flex">
                        <span class="fs-5 fw-bold flex-grow-1">CURSOS </span>
                    </div>
                    <div class="card-body">
                        <p class="card-text">
                        <table id="tbl-cursos" class="table table-bordered  table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Curso</th>
                                    <th>Status</th>
                                    <th>Modalidade</th>
                                    <th>Vagas</th>
                                </tr>
                            </thead>
                        </table>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="card">
                    <div class="card-header bg-info d-flex">
                        <h5 class="fs-6 fw-bold flex-grow-1">POLOS </h5>
                    </div>
                    <div class="card-body">
                        <p class="card-text">
                        <table id="tbl-polos" class="table table-bordered table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>polo</th>
                                    <th>Status</th>
                                    <th>Vagas</th>
                                </tr>
                            </thead>
                        </table>
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="card-footer text-right">
            <a href="{{ route('matriz-captacao.index') }}" class="btn btn-default">Voltar</a>
        </div>
    </form>



@endsection

@section('js')

    <script src="//cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.68/pdfmake.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.68/vfs_fonts.js"></script>
    <script src="//cdn.datatables.net/responsive/2.4.1/js/dataTables.responsive.min.js"></script>
    <script src="//cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js"></script>
    <script src="//cdn.datatables.net/buttons/2.3.6/js/buttons.html5.min.js"></script>
    <script src="//cdn.datatables.net/buttons/2.3.6/js/buttons.print.min.js"></script>
    <script src="//cdn.datatables.net/buttons/2.3.6/js/buttons.colVis.min.js"></script>
    <script src="//cdn.datatables.net/1.13.4/js/dataTables.bootstrap4.min.js"></script>
    <script src="//cdn.datatables.net/buttons/2.3.6/js/buttons.bootstrap4.min.js"></script>


    <script>

        tabelaCursos = $('#tbl-cursos').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{ route("matriz_captacao.cursos.data", $matriz->id) }}',
            columns: [
                { data: 'id', title: 'ID' },
                { data: 'curso', title: 'Curso' },
                { data: 'status', title: 'Status' },
                { data: 'modalidade', title: 'Modalidade' },
                { data: 'vagas', title: 'Vagas' },
            ],
            dom: 'lfrtip',
            // buttons: ['copy', 'csv', 'excel', 'pdf', 'print', 'colvis'],
            responsive: true,
            autoWidth: false,
            language: { url: '/assets/datatables-language-pt-BR.json' },
            pageLength: 10,
            lengthMenu: [[10, 25, 50, -1], ['10', '25', '50', 'Todos']],
        });

        $('#tbl-polos').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{ route("matriz_captacao.polos.data", $matriz->id) }}',
            columns: [
                { data: 'id', title: 'ID' },
                { data: 'polo', title: 'Polo' },
                { data: 'status', title: 'Status' },
                { data: 'vagas', title: 'Vagas' },
            ],
            dom: 'lfrtip',
            // buttons: ['copy', 'csv', 'excel', 'pdf', 'print', 'colvis'],
            responsive: true,
            autoWidth: false,
            language: { url: '/assets/datatables-language-pt-BR.json' },
            pageLength: 10,
            lengthMenu: [[10, 25, 50, -1], ['10', '25', '50', 'Todos']],
        });


    </script>
@endsection