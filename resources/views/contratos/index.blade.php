@extends('adminlte::page')
@section('title', 'Contratos')

@section('css')
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.4/css/dataTables.bootstrap4.min.css">
@endsection

@section('content')
    <div class="mb-3">
        <a href="{{ route('contratos.create') }}" class="btn btn-primary">Novo Contrato</a>
    </div>
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
@endsection

@section('js')
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
                ]
            });
        });
    </script>
@endsection