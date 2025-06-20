@extends('adminlte::page')
@section('title', 'Editar Etapa #' . $etapas_periodos_letivo->id)
@section('content')
    <form action="{{ route('etapas_periodos_letivos.update', $etapas_periodos_letivo) }}" method="POST">
        @csrf @method('PUT')
        @include('etapas_periodos_letivos.form')
        <button type="submit" class="btn btn-primary">Atualizar</button>
        <a href="{{ route('etapas_periodos_letivos.index') }}" class="btn btn-default">Voltar</a>
    </form>
@endsection