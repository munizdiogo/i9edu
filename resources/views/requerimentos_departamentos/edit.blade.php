@extends('adminlte::page')
@section('title', 'Editar Requerimento')

@section('content_header')
    <h1 class="callout callout-info bg-transparent border-none shadow-none">Editar Requerimento
        #{{ $requerimento_departamento->id }}</h1>
@endsection


@section('content')
    <form action="{{ route('requerimentos_departamentos.update', $requerimento_departamento) }}" method="POST">
        @csrf
        @method('PUT')
        @include('requerimentos_departamentos.partials.form')
    </form>
@endsection