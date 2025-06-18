@extends('adminlte::page')
@section('title', 'Editar Matriz Curricular')
@section('content_header')<h1>Editar Matriz #{{ $matriz->id }}</h1>@endsection
@section('content')
    <form action="{{ route('matrizes.update', $matriz) }}" method="post">
        @csrf @method('PUT')
        @include('matrizes.form')
    </form>
@endsection