@extends('adminlte::page')

@section('title', 'Novo Plano de Pagamento')

@section('content_header')
<h1 class="d-inline">Novo Plano de Pagamento</h1>
<a href="{{ route('planos_pagamento.index') }}" class="btn btn-default float-right">Voltar</a>
@stop

@section('content')
<form action="{{ route('planos_pagamento.store') }}" method="POST">
    @csrf

    {{-- inclui os campos básicos: nome, flags --}}
    @include('planos.form')

    <div class="mt-3 text-right">
        <button type="submit" class="btn btn-success">Inserir</button>
    </div>
</form>
@stop