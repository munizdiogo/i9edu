@extends('adminlte::page')
@section('title', 'Detalhes do Funcionário #' . $funcionario->id)
@section('content_header')<h1>Detalhes do Funcionário #{{ $funcionario->id }}</h1>@endsection
@section('content')
    <div class="card">
        <div class="card-body">
            <fieldset disabled>@include('funcionarios.form')</fieldset>
        </div>
        <div class="card-footer text-right">
            <a href="{{ route('funcionarios.index') }}" class="btn btn-default">Voltar</a>
        </div>
    </div>
@endsection