@extends('adminlte::page')
@section('title', 'Detalhes do Setor #' . $setor->id)
@section('content_header')
    <h1>Detalhes do Setor #{{ $setor->id }}</h1>
@endsection
@section('content')
    <div class="card">
        <div class="card-body">
            <fieldset disabled>@include('setores.form')</fieldset>
        </div>
        <div class="card-footer text-right">
            <a href="{{ route('setores.index') }}" class="btn btn-default">Voltar</a>
        </div>
    </div>
@endsection