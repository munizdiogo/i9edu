@extends('adminlte::page')
@section('title', 'Nova Transação')
@section('content_header')
<h1>Nova Transação</h1>
@stop

@section('content')
    <form action="{{ route('transacoes.store') }}" method="POST">
        @csrf
        @include('transacoes.form')
        <button class="btn btn-primary">Salvar</button>
        <a href="{{ route('transacoes.index') }}" class="btn btn-default">Voltar</a>
    </form>
@endsection