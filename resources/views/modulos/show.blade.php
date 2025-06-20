@extends('adminlte::page')
@section('title', 'Detalhes do Módulo')
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