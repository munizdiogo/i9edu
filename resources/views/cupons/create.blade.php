@extends('adminlte::page')
@section('title', 'Novo Cupom')
@section('content_header')
    <h1>Novo Cupom de Desconto</h1>
@endsection
@section('content')
    <form action="{{ route('cupons.store') }}" method="POST">
        @csrf
        @include('cupons.form')
        <button class="btn btn-primary">Salvar</button>
        <a href="{{ route('cupons.index') }}" class="btn btn-default">Voltar</a>
    </form>
@endsection