@extends('adminlte::page')
@section('title', 'Novo Convênio')
@section('content')
    <form action="{{ route('convenios.store') }}" method="POST">
        @csrf
        @include('convenios.form')
        <button class="btn btn-primary">Salvar</button>
        <a href="{{ route('convenios.index') }}" class="btn btn-default">Voltar</a>
    </form>
@endsection