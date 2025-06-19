@extends('adminlte::page')
@section('title', 'Editar Aluno')
@section('content_header')<h1>Editar Aluno #{{ $aluno->id }}</h1>@endsection

@section('content')
    <form action="{{ route('alunos.update', $aluno) }}" method="post">
        @csrf @method('PUT')
        @include('alunos.form')
    </form>
@endsection