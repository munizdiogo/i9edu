@extends('adminlte::page')
@section('title', 'Regras de Acesso')

@section('content_header')
    <div class="my-4">
        <h1 class="callout callout-info bg-transparent border-none shadow-none p-4 d-inline">
            Regras de Acesso
        </h1>
        @can('roles.create')
            <a href="{{ route('roles.create') }}" class="btn btn-success float-right">
                <i class="fa fa-plus"></i> Nova Regra
            </a>
        @endcan
    </div>
@endsection

@section('content')
    <div class="container-fluid">

        <div class="card">
            <div class="card-body p-0">
                <table class="table table-hover table-striped mb-0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nome</th>
                            <th>Descrição</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($roles as $role)
                            <tr>
                                <td>{{ $role->id }}</td>
                                <td>{{ $role->name }}</td>
                                <td>{{ $role->description }}</td>
                                <td>
                                    <a href="{{ route('roles.permissions', $role->id) }}" class="btn btn-sm btn-info">
                                        <i class="fas fa-user-shield"></i></a>
                                    <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-sm btn-warning">
                                        <i class="fa fa-edit"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('js')
    @include('components.alert-swal-retorno-operacao')
    @include('components.alert-swal-excluir')
@endsection