@extends('adminlte::page')
@section('title', 'Editar Vínculo Disciplina x Matriz Curricular')
@section('content_header')
    <h1>Editar Disciplina x Matriz Curricular #{{ $grade_disciplinas_matrize->id }}</h1>
@endsection
@section('content')
    <form action="{{ route('grade_disciplinas_matrizes.update', $grade_disciplinas_matrize) }}" method="POST">
        @csrf @method('PUT')
        @include('grade_disciplinas_matrizes.form')
    </form>
@endsection