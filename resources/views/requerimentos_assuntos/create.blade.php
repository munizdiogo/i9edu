@extends('adminlte::page')
@section('title', 'Novo Assunto de Requerimento')
@section('content')
    <form action="{{ route('requerimentos_assuntos.store') }}" method="POST">
        @csrf
        @include('requerimentos_assuntos.partials.form')
        <button type="submit" class="btn btn-primary">Salvar</button>
        <a href="{{ route('requerimentos_assuntos.index') }}" class="btn btn-default">Voltar</a>
    </form>

@endsection

@section('js')
    @include('components.alert-swal-retorno-operacao')
@endsection