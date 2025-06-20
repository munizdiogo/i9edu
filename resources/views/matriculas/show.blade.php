@extends('adminlte::page')
@section('title', 'Detalhes da Matrícula #' . $matricula->id)
@section('content_header')<h1>Detalhes da Matrícula #{{ $matricula->id }}</h1>@endsection
@section('content')
    <div class="card">
        <div class="card-body">
            <fieldset disabled>@include('matriculas.form')</fieldset>
        </div>
        <div class="card-footer text-right">
            <a href="{{ route('matriculas.index') }}" class="btn btn-default">Voltar</a>
        </div>
    </div>
@endsection