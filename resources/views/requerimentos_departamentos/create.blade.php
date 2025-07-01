@extends('adminlte::page')
@section('title', 'Novo Requerimento')
@section('content')
    <form action="{{ route('requerimentos_departamentos.store') }}" method="POST">
        @csrf
        @include('requerimentos_departamentos.partials.form')
        <button class="btn btn-primary">Salvar</button>
        <a href="{{ route('requerimentos_departamentos.index') }}" class="btn btn-default">Voltar</a>
    </form>
@endsection