@extends('adminlte::page')
@section('title', 'Detalhes da Etapa #' . $etapas_periodos_letivo->id)
@section('content_header')<h1>Detalhes da Etapa #{{ $etapas_periodos_letivo->id }}</h1>@endsection
@section('content')
    <div class="card">
        <div class="card-body">
            <fieldset disabled>@include('etapas_periodos_letivos.form')</fieldset>
        </div>
        <div class="card-footer text-right">
            <a href="{{ route('etapas_periodos_letivos.index') }}" class="btn btn-default">Voltar</a>
        </div>
    </div>
@endsection