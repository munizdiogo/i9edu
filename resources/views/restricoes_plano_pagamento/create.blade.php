@extends('adminlte::page')
@section('title', 'Adicionar Restrição')

@section('content_header')
    <h1 class="callout callout-info bg-transparent border-none shadow-none">Adicionar Restrição</h1>
@endsection

@section('content')
    <form action="{{ route('restricoes_plano_pagamento.store') }}" method="POST">
        @csrf
        @include('restricoes_plano_pagamento.partials.form')
    </form>
@endsection