@extends('adminlte::page')
@section('title', 'Editar Curso')

@section('content_header')
    <h1 class="callout callout-info bg-transparent border-none shadow-none">Editar Curso #{{ $curso->id }}</h1>
@endsection

@section('content')
    <form action="{{ route('cursos.update', $curso) }}" method="post">
        @csrf @method('PUT')
        @include('cursos.partials.form')
    </form>
@endsection