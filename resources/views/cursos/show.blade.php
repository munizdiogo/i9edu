@extends('adminlte::page')
@section('title', 'Detalhes do Curso')
@section('content_header')<h1>Detalhes do Curso</h1>@endsection
@section('content')
    <div class="card">
        <div class="card-body">
            <fieldset disabled>@include('cursos.form')</fieldset>
        </div>
        <div class="card-footer text-right"><a href="{{ route('cursos.index') }}" class="btn btn-default">Voltar</a></div>
    </div>
@endsection