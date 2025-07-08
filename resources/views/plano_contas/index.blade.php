@extends('adminlte::page')
@section('title', 'Plano de Contas')
@section('content_header')
    <h1 class="d-inline">Plano de Contas</h1>
    <a href="{{ route('plano-contas.create') }}" class="btn btn-success float-right">Novo Plano</a>
@endsection
@section('css')
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.4/css/dataTables.bootstrap4.min.css">
@endsection
@section('content')
    <div class="card p-4">
        <div class="card-body p-0">
            <table id="datatable" class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Descrição</th>
                        <th>Código</th>
                        <th>Status</th>
                        <th>Grupo</th>
                        <th>Ações</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
@endsection
@section('js')
    @include('plano_contas.partials.datatable')
@endsection