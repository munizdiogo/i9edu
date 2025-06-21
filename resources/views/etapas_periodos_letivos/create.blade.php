@extends('adminlte::page')
@section('title', 'Nova Etapa')
@section('content_header')<h1>Nova Etapa</h1>@endsection
@section('content')
    <form action="{{ route('etapas_periodos_letivos.store') }}" method="POST">
        @csrf
        @include('etapas_periodos_letivos.form')
    </form>
@endsection