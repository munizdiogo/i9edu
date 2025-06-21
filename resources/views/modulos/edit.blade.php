@extends('adminlte::page')
@section('title', 'Editar Módulo #' . $modulo->id)
@section('content_header')<h1>Editar Módulo #{{ $modulo->id }}</h1>@endsection
@section('content')
    <form action="{{ route('modulos.update', $modulo) }}" method="POST">
        @csrf @method('PUT')
        @include('modulos.form')
    </form>
@endsection