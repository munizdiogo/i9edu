@extends('adminlte::page')
@section('title', 'Editar Assunto de Requerimento')
@section('content')
    <form action="{{ route('requerimentos_assuntos.update', $requerimento_assunto->id) }}" method="POST">
        @csrf
        @method('PUT')
        @include('requerimentos_assuntos.partials.form', ['requerimentoAssunto' => $requerimento_assunto])
        <button type="submit" class="btn btn-primary">Atualizar</button>
        <a href="{{ route('requerimentos_assuntos.index') }}" class="btn btn-default">Voltar</a>
    </form>
@endsection