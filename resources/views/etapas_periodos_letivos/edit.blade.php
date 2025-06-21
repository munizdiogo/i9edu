@extends('adminlte::page')
@section('title', 'Editar Etapa #' . $etapas_periodos_letivo->id)
@section('content_header')<h1>Editar Etapa #{{ $etapas_periodos_letivo->id }}</h1>@endsection
@section('content')
    <form action="{{ route('etapas_periodos_letivos.update', $etapas_periodos_letivo) }}" method="POST">
        @csrf @method('PUT')
        @include('etapas_periodos_letivos.form')
    </form>
@endsection