@extends('adminlte::page')
@section('title', 'Restrições Plano de Pagamento')

@section('content_header')
    <div class="my-4">
        <h1 class="callout callout-info bg-transparent border-none shadow-none p-4 d-inline">Restrições Plano de Pagamento
        </h1>

        @can('restricoes_plano_pagamento.create')
            <a href="{{ route('restricoes_plano_pagamento.create') }}" class="btn btn-success float-right">
                <i class="fa fa-plus"></i> Nova Restrição Plano de Pagamento
            </a>
        @endcan
    </div>
@endsection


@section('css')
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.4/css/dataTables.bootstrap4.min.css">
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <table id="restricoes-table" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Plano de Pagamento</th>
                        <th>Curso</th>
                        <th>Polo</th>
                        <th>Turma</th>
                        <th>Modalidade</th>
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
            $('#restricoes-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('restricoes_plano_pagamento.data') }}',
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'plano', name: 'plano', defaultContent: '-' },
                    { data: 'cursos', name: 'cursos', defaultContent: '-' },
                    { data: 'polos', name: 'polos', defaultContent: '-' },
                    { data: 'turmas', name: 'turmas', defaultContent: '-' },
                    { data: 'modalidade', name: 'modalidade', defaultContent: '-' },
                    { data: 'actions', name: 'actions', orderable: false, searchable: false },
                ],
                language: { url: 'https://cdn.datatables.net/plug-ins/1.13.4/i18n/pt-BR.json' }
            });
        });
    </script>
@endsection