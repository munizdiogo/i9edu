@extends('adminlte::page')
@section('title', 'Novo Aluno')
@section('content_header')<h1>Novo Aluno</h1>@endsection
@section('content')
    <form action="{{ route('alunos.store') }}" method="post">
        @csrf
        @include('alunos.form')
    </form>
@endsection