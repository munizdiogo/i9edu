@extends('adminlte::page')
@section('title', 'Editar Disciplina Base #' . $disciplinas_base->id)
@section('content_header')
    <h1>Editar Disciplina Base #{{ $disciplinas_base->id }}</h1>
@endsection
@section('content')
    <form action="{{ route('disciplinas_base.update', $disciplinas_base) }}" method="post">
        @csrf
        @method('PUT')
        @include('disciplinas_base.form')
    </form>
@endsection