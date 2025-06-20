@extends('adminlte::page')
@section('title', 'Editar Matrícula #' . $matricula->id)
@section('content_header')<h1>Editar Matrícula #{{ $matricula->id }}</h1>@endsection
@section('content')
    <form action="{{ route('matriculas.update', $matricula) }}" method="post">
        @csrf @method('PUT')
        @include('matriculas.form')
    </form>
@endsection