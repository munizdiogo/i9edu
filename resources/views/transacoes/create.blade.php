@extends('adminlte::page')
@section('title', 'Nova Transação')

@section('content_header')
    <h1 class="callout callout-info bg-transparent border-none shadow-none">Nova Transação</h1>
@endsection


@section('content')
    <form action="{{ route('transacoes.store') }}" method="POST">
        @csrf
        @include('transacoes.partials.form')
    </form>
@endsection