@extends('adminlte::page')
@section('title', 'Editar Período Letivo')
@section('content_header')<h1>Editar Período #{{ $periodo->id }}</h1>@endsection
@section('content')
    <form action="{{ route('periodos.update', $periodo) }}" method="post">
        @csrf @method('PUT')
        @include('periodos.form')
    </form>
@endsection