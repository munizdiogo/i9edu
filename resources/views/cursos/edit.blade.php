@extends('adminlte::page')
@section('title', 'Editar Curso')
@section('content_header')<h1>Editar Curso #{{ $curso->id }}</h1>@endsection
@section('content')
    <form action="{{ route('cursos.update', $curso) }}" method="post">
        @csrf @method('PUT')
        @include('cursos.form')
    </form>
@endsection