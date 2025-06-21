@extends('adminlte::page')
@section('title', 'Detalhes da Disciplina #' . $disciplina->id)
@section('content_header')<h1>Detalhes da Disciplina #{{ $disciplina->id }}</h1>@endsection
@section('content')
    <div class="card">
        <div class="card-body">
            <fieldset disabled>@include('disciplinas.form')</fieldset>
        </div>
        <div class="card-footer text-right">
            <a href="{{ route('disciplinas.index') }}" class="btn btn-default">Voltar</a>
        </div>
    </div>
@endsection