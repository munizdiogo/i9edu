@extends('adminlte::page')
@section('title', 'Plano de Contas')

@section('content_header')
    <div class="my-4">
        <h1 class="callout callout-info bg-transparent border-none shadow-none p-4 d-inline">Plano de Contas</h1>

        @can('plano-contas.create')
            <a href="{{ route('plano-contas.create') }}" class="btn btn-success float-right">
                <i class="fa fa-plus"></i> Novo Plano
            </a>
        @endcan
    </div>
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
    @include('components.alert-swal-retorno-operacao')
    @include('components.alert-swal-excluir')

    @include('plano_contas.partials.datatable')
@endsection