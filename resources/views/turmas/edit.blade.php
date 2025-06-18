@extends('adminlte::page')
@section('title', 'Editar Turma')
@section('content_header')<h1>Editar Turma #{{ $turma->id }}</h1>@endsection
@section('content').
    <form action="{{ route('turmas.update', $turma) }}" method="post">
        @csrf @method('PUT')
        @include('turmas.form')
    </form>
@endsection