@extends('adminlte::page')
@section('title', 'Editar Requerimento')
@section('content')
    <form action="{{ route('requerimentos_departamentos.update', $requerimento_departamento) }}" method="POST">
        @csrf
        @method('PUT')
        @include('requerimentos_departamentos.partials.form')
        <button class="btn btn-primary">Atualizar</button>
        <a href="{{ route('requerimentos_departamentos.index') }}" class="btn btn-default">Voltar</a>
    </form>
@endsection