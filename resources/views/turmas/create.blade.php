@extends('adminlte::page')
@section('title', 'Nova Turma')
@section('content_header')<h1>Nova Turma</h1>@endsection
@section('content')
    <form action="{{ route('turmas.store') }}" method="post">
        @csrf @include('turmas.form')
    </form>
@endsection