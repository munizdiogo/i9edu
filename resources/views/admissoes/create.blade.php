@extends('adminlte::page')

@section('title', 'Novo Curso Ingresso')

@section('content_header')
    <h1>Novo Curso Ingresso</h1>
@endsection

@section('content')
    <form action="{{ route('admissoes.store') }}" method="post">
        @csrf
        @include('admissoes.form')
    </form>
@endsection