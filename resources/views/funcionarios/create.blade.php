@extends('adminlte::page')
@section('title', 'Novo Funcionário')
@section('content_header')
    <h1>Novo Funcionário</h1>
@endsection
@section('content')
    <form action="{{ route('funcionarios.store') }}" method="POST">@csrf
        @include('funcionarios.form')
        <button class="btn btn-primary">Salvar</button>
        <a href="{{ route('funcionarios.index') }}" class="btn btn-default">Voltar</a>
    </form>
@endsection