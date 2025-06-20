@extends('adminlte::page')
@section('title', 'Detalhes Etapa #' . $etapas_periodos_letivo->id)
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