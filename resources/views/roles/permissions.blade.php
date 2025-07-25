@extends('adminlte::page')
@section('title', 'Permissões da Regra')

@section('content_header')
    <h1 class="callout callout-info bg-transparent border-none shadow-none">
        Permissões da Regra: <span class="font-weight-bold">{{ $role->name }}
    </h1>
@endsection

@section('content')
    <form method="POST" action="{{ route('roles.permissions.update', $role) }}">
        @csrf
        @method('PUT')

        <div class="card">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover mb-0">
                        <thead>
                            <tr>
                                <th>Módulo</th>
                                <th class="text-center">Visualizar</th>
                                <th class="text-center">Cadastrar</th>
                                <th class="text-center">Editar</th>
                                <th class="text-center">Excluir</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($permissionsByCollection as $collection => $permissions)
                                <tr>
                                    <td class="align-middle"><strong>{{ $collection }}</strong></td>
                                    @foreach(['view', 'create', 'edit', 'delete'] as $action)
                                        @php
                                            $permission = $permissions->firstWhere('name', Str::slug($collection, '_') . '.' . $action);
                                            $isChecked = $permission && in_array($permission->id, $rolePermissions);
                                        @endphp
                                        <td class="text-center align-middle">
                                            @if($permission)
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" name="permissions[]" value="{{ $permission->id }}"
                                                        class="custom-control-input" id="perm_{{ $permission->id }}" {{ $isChecked ? 'checked' : '' }}>
                                                    <label for="perm_{{ $permission->id }}" class="custom-control-label"></label>
                                                </div>
                                            @endif
                                        </td>
                                    @endforeach
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="card-footer text-right mb-3">
            <a href="{{ route('roles.index') }}" class="btn btn-default">Voltar</a>
            <button type="submit" class="btn btn-success">Salvar</button>
        </div>
    </form>
@endsection