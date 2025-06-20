@extends('adminlte::page')
@section('title', 'Editar Módulo')
@section('content')
    <form action="{{ route('modulos.update', $modulo) }}" method="POST">
        @csrf @method('PUT')
        @include('modulos.form')
        <button class="btn btn-primary">Atualizar</button>
        <a href="{{ route('modulos.index') }}" class="btn btn-default">Voltar</a>
    </form>
@endsection