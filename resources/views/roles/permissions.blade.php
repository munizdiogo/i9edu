@extends('adminlte::page')
@section('title', 'Permissões da Regra')
@section('content')

    <h1 class="mb-3">Permissões da Regra: <span class="font-weight-bold">{{ $role->name }}</span></h1>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form method="POST" action="{{ route('roles.permissions.update', $role) }}">
        @csrf
        @method('PUT')

        <div class="card">
            <div class="card-body p-0">
                <table class="table table-bordered table-hover mb-0">
                    <thead>
                        <tr>
                            <th>Módulo</th>
                            <th>Visualizar</th>
                            <th>Cadastrar</th>
                            <th>Editar</th>
                            <th>Excluir</th>
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
                                            <input type="checkbox" name="permissions[]" value="{{ $permission->id }}"
                                                id="perm_{{ $permission->id }}" {{ $isChecked ? 'checked' : '' }}>
                                            <label for="perm_{{ $permission->id }}" class="sr-only">{{ $permission->label }}</label>
                                        @endif
                                    </td>
                                @endforeach
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-footer text-right">
                <a href="{{ route('roles.index') }}" class="btn btn-default">Voltar</a>
                <button type="submit" class="btn btn-success">Salvar Permissões</button>
            </div>
        </div>
    </form>
@endsection

@push('js')
    <script>
        // (Opcional) Adicione JS para selecionar/desmarcar todos de uma coluna/módulo, se desejar!
    </script>
@endpush