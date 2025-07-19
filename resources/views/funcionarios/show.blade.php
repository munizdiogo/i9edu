@extends('adminlte::page')
@section('title', 'Detalhes do Funcionário #' . $funcionario->id)


@section('content_header')
    <div class="my-4">
        <h1 class="callout callout-info bg-transparent border-none shadow-none p-4 d-inline">Detalhes do Funcionário
            #{{ $funcionario->id }}</h1>
        <a href="{{ route('funcionarios.edit', $funcionario) }}" class="btn my-0 btn-warning float-right">
            <i class="fas fa-edit"></i> Editar
        </a>
    </div>
@endsection

@section('content')
    <fieldset disabled>@include('funcionarios.partials.form')</fieldset>

    <div class="card-footer text-right">
        <a href="{{ route('funcionarios.index') }}" class="btn btn-default">Voltar</a>
    </div>
@endsection