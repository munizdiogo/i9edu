@extends('adminlte::page')
@section('title', 'Nova Etapa')
@section('content')
    <form action="{{ route('etapas_periodos_letivos.store') }}" method="POST">
        @csrf
        @include('etapas_periodos_letivos.form')
        <button type="submit" class="btn btn-primary">Salvar</button>
        <a href="{{ route('etapas_periodos_letivos.index') }}" class="btn btn-default">Voltar</a>
    </form>
@endsection