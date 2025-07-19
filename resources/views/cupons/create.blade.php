@extends('adminlte::page')
@section('title', 'Novo Cupom')


@section('content_header')
    <h1 class="callout callout-info bg-transparent border-none shadow-none">Novo Cupom de Desconto</h1>
@endsection
@section('content')
    <form action="{{ route('cupons.store') }}" method="POST">
        @csrf
        @include('cupons.partials.form')
    </form>
@endsection