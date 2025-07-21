@extends('adminlte::page')

@section('title', 'Novo Plano de Pagamento')

@section('content_header')
<h1 class="d-inline">Novo Plano de Pagamento</h1>
<a href="{{ route('planos_pagamento.index') }}" class="btn btn-default float-right">Voltar</a>
@stop

@section('content')
<form action="{{ route('planos_pagamento.store') }}" method="POST">
    @csrf
    @include('planos.partials.form')
</form>
@stop