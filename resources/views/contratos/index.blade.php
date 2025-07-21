@extends('adminlte::page')
@section('title', 'Contratos')

@section('content_header')
    <div class="my-4">
        <h1 class="callout callout-info bg-transparent border-none shadow-none p-4 d-inline">Contratos</h1>

        @can('contratos.create')
            <a href="{{ route('contratos.create') }}" class="btn btn-success float-right">
                <i class="fa fa-plus"></i> Novo Contrato
            </a>
        @endcan
    </div>
@endsection


@section('css')
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.4/css/dataTables.bootstrap4.min.css">
@endsection

@section('content')
    <div class="card p-4">
        <table id="contratos-table" class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Aluno</th>
                    <th>Curso</th>
                    <th>ID Matrícula</th>
                    <th>Turma</th>
                    <th>Plano Pgto</th>
                    <th>Status</th>
                    <th>Data Aceite</th>
                    <th>Ações</th>
                </tr>
            </thead>
        </table>
        <div />
@endsection

    @section('js')
        @include('components.alert-swal-retorno-operacao')
        @include('components.alert-swal-excluir')

        <script src="//code.jquery.com/jquery-3.7.0.min.js"></script>
        <script src="//cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
        <script src="//cdn.datatables.net/1.13.4/js/dataTables.bootstrap4.min.js"></script>
        <script>
            $(function () {
                $('#contratos-table').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: '{{ route('contratos.data') }}',
                    columns: [
                        { data: 'id' },
                        { data: 'perfil', defaultContent: '-' },
                        { data: 'curso', defaultContent: '-' },
                        { data: 'matricula', defaultContent: '-' },
                        { data: 'turma', defaultContent: '-' },
                        { data: 'plano_pagamento', defaultContent: '-' },
                        { data: 'status' },
                        { data: 'data_aceite' },
                        { data: 'actions', orderable: false, searchable: false }
                    ],
                    language: { url: 'https://cdn.datatables.net/plug-ins/1.13.4/i18n/pt-BR.json' },
                });
            });
        </script>
    @endsection