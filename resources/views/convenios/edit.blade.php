@extends('adminlte::page')
@section('title', 'Editar Convênio')
@section('content')
    <form action="{{ route('convenios.update', $convenio) }}" method="POST">
        @csrf
        @method('PUT')
        @include('convenios.form')
        <button class="btn btn-primary">Salvar</button>
        <a href="{{ route('convenios.index') }}" class="btn btn-default">Voltar</a>
    </form>
@endsection