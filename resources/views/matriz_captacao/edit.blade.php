@extends('adminlte::page')
@section('title', 'Nova Matriz Captação')
@section('content_header')
    <h1 class="d-inline">Nova Matriz Captação</h1>
@endsection
@section('css')
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/buttons/2.3.6/css/buttons.bootstrap4.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/responsive/2.4.1/css/responsive.bootstrap4.min.css">
@endsection
@section('content')

    <form method="POST" action="{{ route('matriz-captacao.update', $matriz) }}">
        @csrf @isset($matriz)
            @method('PUT')
        @endisset
        <ul class="nav nav-tabs">
            <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#tab-dados">Dados Gerais</a></li>
            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#tab-cursos">Cursos</a></li>
            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#tab-polos">Polos</a></li>
        </ul>
        <div class="tab-content p-3">
            <div class="tab-pane active" id="tab-dados">
                @include('matriz_captacao.partials.form')
            </div>
            <div class="tab-pane" id="tab-cursos">
                <button type="button" class="btn btn-sm btn-primary mb-2" data-toggle="modal"
                    data-target="#modalCurso">Adicionar Curso</button>
                <table id="tbl-cursos" class="table table-bordered"></table>
            </div>
            <div class="tab-pane" id="tab-polos">
                <button type="button" class="btn btn-sm btn-primary mb-2" data-toggle="modal"
                    data-target="#modalPolo">Adicionar Polo</button>
                <table id="tbl-polos" class="table table-bordered"></table>
            </div>
        </div>
        <div class="mt-3 text-right">
            <button class="btn btn-default">Voltar</button>
            <button class="btn btn-primary">Salvar</button>
        </div>
    </form>

    {{-- @include('matriz_captacao.partials.modal-curso')
    @include('matriz_captacao.partials.modal-polo') --}}

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
        // Apenas quando $matriz existir (edit/show)
        $('#tbl-cursos').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{ route("matriz_captacao.cursos.data", $matriz->id) }}',
            columns: [
                { data: 'id', title: 'ID' },
                { data: 'curso', title: 'Curso' },
                { data: 'status', title: 'Status' },
                { data: 'modalidade', title: 'Modalidade' },
                { data: 'vagas', title: 'Vagas' },
                { data: 'actions', title: 'Ações', orderable: false, searchable: false }
            ],
            responsive: true,
            language: { url: '//cdn.datatables.net/plug-ins/1.13.4/i18n/pt-BR.json' }
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
                { data: 'actions', title: 'Ações', orderable: false, searchable: false }
            ],
            responsive: true,
            language: { url: '//cdn.datatables.net/plug-ins/1.13.4/i18n/pt-BR.json' }
        });
                                                                                                                                                                  });
    </script>
@endsection