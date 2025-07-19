@extends('adminlte::page')
@section('title', 'Detalhes do Período Letivo')

@section('content_header')
    <div class="my-4">
        <h1 class="callout callout-info bg-transparent border-none shadow-none p-4 d-inline">Detalhes do Período
            #{{ $periodo->id }}</h1>
        <a href="{{ route('periodos.edit', $periodo) }}" class="btn my-0 btn-warning float-right">
            <i class="fas fa-edit"></i> Editar
        </a>
    </div>
@endsection

@section('content')
    <fieldset disabled>@include('periodos.partials.form')</fieldset>

    <div class="card-footer text-right">
        <a href="{{ route('periodos.index') }}" class="btn btn-default">Voltar</a>
    </div>
@endsection