@extends('adminlte::page')
@section('title', 'Nova Função')

@section('content_header')
    <h1 class="callout callout-info bg-transparent border-none shadow-none">Nova função</h1>
@endsection


@section('content')
    <form action="{{ route('funcoes.store') }}" method="POST">@csrf
        @include('funcoes.partials.form')
    </form>
@endsection