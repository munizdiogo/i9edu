@extends('adminlte::page')
@section('title', 'Editar Solicitação de Requerimento')
@section('content')
    <form action="{{ route('requerimentos_solicitacoes.update', $requerimento) }}" method="POST">
        @csrf
        @method('PUT')
        @include('requerimentos_solicitacoes.partials.form')
        <button type="submit" class="btn btn-primary">Atualizar</button>
        <a href="{{ route('requerimentos_solicitacoes.index') }}" class="btn btn-default">Voltar</a>
    </form>
@endsection