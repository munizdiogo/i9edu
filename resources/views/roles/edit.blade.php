@extends('adminlte::page')
@section('title', 'Editar Regra')

@section('content_header')
    <h1 class="callout callout-info bg-transparent border-none shadow-none">Editar Regra #{{$role->id}}</h1>
@endsection

@section('content')


    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $erro)
                    <li>{{ $erro }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('roles.update', $role) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="card card-primary">
            <div class="card-body">
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="name">Nome <sup class="marcador_obrigatorio">(Obrigatório)</sup></label>
                        <input type="text" name="name" id="name" class="form-control" required
                            value="{{ old('name', $role->name) }}">
                    </div>
                    <div class="form-group col-md-12">
                        <label for="description">Descrição</label>
                        <input type="text" name="description" id="description" class="form-control"
                            value="{{ old('description', $role->description) }}">
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer text-right">
            <a href="{{ route('roles.index') }}" class="btn btn-default">Voltar</a>
            <button type="submit" class="btn btn-success">Salvar Alterações</button>
        </div>
    </form>
@endsection