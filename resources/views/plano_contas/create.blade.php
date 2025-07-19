@extends('adminlte::page')
@section('title', 'Novo Plano de Contas')

@section('content_header')
    <h1 class="callout callout-info bg-transparent border-none shadow-none">
        Novo Plano de Contas
    </h1>
@endsection

@section('content')
    <div class="p-4">
        <form action="{{ route('plano-contas.store') }}" method="POST">
            @csrf
            @include('plano_contas.partials.form')
        </form>
    </div>
@endsection