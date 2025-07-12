@extends('adminlte::page')
@section('title', 'Nova Regra')
@section('content')

    @section('content_header')
        <h1 class="callout callout-info bg-transparent border-none shadow-none">
            Nova regra
        </h1>
    @endsection

    <form action="{{ route('roles.store') }}" method="POST">
        @csrf

        <div class="card card-primary">
            <div class="card-body">
                <div class="form-row">
                    <div class="form-group col-md-5">
                        <label for="name">Nome <sup class="marcador_obrigatorio">(Obrigatório)</sup></label>
                        <input type="text" name="name" id="name" class="form-control" required value="{{ old('name') }}">
                    </div>
                    <div class="form-group col-md-7">
                        <label for="description">Descrição</label>
                        <input type="text" name="description" id="description" class="form-control"
                            value="{{ old('description') }}">
                    </div>
                </div>
            </div>
        </div>

        <div class="card card-info">
            <div class="card-header"><b>Permissões</b></div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover mb-0">
                        <thead>
                            <tr>
                                <th class="text-center">Módulo</th>
                                <th class="text-center">Visualizar</th>
                                <th class="text-center">Cadastrar</th>
                                <th class="text-center">Editar</th>
                                <th class="text-center">Excluir</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($permissions->groupBy('collection') as $collection => $perms)
                                <tr>
                                    <td><strong>{{ $collection }}</strong></td>
                                    @foreach(['view', 'create', 'edit', 'delete'] as $action)
                                        @php
                                            $permission = $perms->firstWhere('name', Str::slug($collection, '_') . '.' . $action);
                                        @endphp
                                        <td class="text-center">
                                            @if($permission)
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" name="permissions[]" value="{{ $permission->id }}"
                                                        class="custom-control-input" id="perm_{{ $permission->id }}">
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
        <div class="card-footer text-right mb-4">
            <a href="{{ route('roles.index') }}" class="btn btn-default">Voltar</a>
            <button type="submit" class="btn btn-success">Salvar</button>
        </div>
    </form>
@endsection