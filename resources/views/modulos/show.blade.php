@extends('adminlte::page')
@section('title', 'Detalhes do Módulo #' . $modulo->id)
@section('content_header')<h1>Detalhes do Módulo #{{ $modulo->id }}</h1>@endsection
@section('content')
    <div class="card">
        <div class="card-body">
            <fieldset disabled>@include('modulos.form')</fieldset>
        </div>
        <div class="card-footer text-right">
            <a href="{{ route('modulos.index') }}" class="btn btn-default">Voltar</a>
        </div>
    </div>
@endsection