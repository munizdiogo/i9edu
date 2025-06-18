@extends('adminlte::page')
@section('title', 'Detalhes da Turma')
@section('content_header')
    <h1>Detalhes da Turma #{{ $turma->id }}</h1>
@endsection
@section('content')<div class="card">
    <div class="card-body">
        <fieldset disabled>@include('turmas.form')</fieldset>
    </div>
    <div class="card-footer text-right"><a href="{{ route('turmas.index') }}" class="btn btn-default">Voltar</a></div>
</div>@endsection