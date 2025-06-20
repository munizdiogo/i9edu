@extends('adminlte::page')
@section('title', 'Editar Área de Conhecimento')
@section('content')
    <form action="{{ route('area_conhecimentos.update', $area_conhecimento) }}" method="POST">
        @csrf @method('PUT')
        @include('area_conhecimentos.form')
        <button type="submit" class="btn btn-primary">Salvar</button>
        <a href="{{ route('area_conhecimentos.index') }}" class="btn btn-secondary">Voltar</a>
    </form>
@endsection