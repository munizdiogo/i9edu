@extends('adminlte::page')

@section('title', 'Detalhes da Etapa #' . $etapas_periodos_letivo->id)

@section('content_header')
    <div class="my-4">
        <h1 class="callout callout-info bg-transparent border-none shadow-none p-4 d-inline">
            Detalhes da Etapa #{{ $etapas_periodos_letivo->id }}</h1>
        <a href="{{ route('etapas_periodos_letivos.edit', $etapas_periodos_letivo) }}"
            class="btn my-0 btn-warning float-right">
            <i class="fas fa-edit"></i> Editar
        </a>
    </div>
@endsection

@section('content')
    <fieldset disabled>@include('etapas_periodos_letivos.partials.form')</fieldset>

    <div class="card-footer text-right">
        <a href="{{ route('etapas_periodos_letivos.index') }}" class="btn btn-default">Voltar</a>
    </div>
@endsection