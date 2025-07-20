@extends('adminlte::page')
@section('title', 'Editar Restrição')

@section('content_header')
    <h1 class="callout callout-info bg-transparent border-none shadow-none">Editar Restrição #{{ $restricao->id }}</h1>
@endsection

@section('content')
    <form action="{{ route('restricoes_plano_pagamento.update', $restricao) }}" method="POST">
        @csrf
        @method('PUT')
        @include('restricoes_plano_pagamento.partials.form')
    </form>
@endsection