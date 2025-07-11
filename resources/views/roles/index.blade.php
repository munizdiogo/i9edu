@extends('adminlte::page')
@section('title', 'Gerenciar Roles')
@section('content')
    <a href="{{ route('roles.create') }}" class="btn btn-primary mb-2">Nova Regra</a>
    <table class="table">
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
                        <a href="{{ route('roles.permissions', $role->id) }}" class="btn btn-sm btn-info">Permissões</a>
                        <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-sm btn-warning">Editar</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection