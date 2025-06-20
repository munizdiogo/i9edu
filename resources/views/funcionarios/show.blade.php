@extends('adminlte::page')
@section('title', 'Detalhes do Funcionário #' . $funcionario->id)
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