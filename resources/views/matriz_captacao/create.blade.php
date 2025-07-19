@extends('adminlte::page')
@section('title', 'Nova Matriz Captação')
@section('content_header')
    <h1 class="callout callout-info bg-transparent border-none shadow-none">Nova Matriz Captação</h1>
@endsection
@section('css')
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/buttons/2.3.6/css/buttons.bootstrap4.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/responsive/2.4.1/css/responsive.bootstrap4.min.css">
@endsection
@section('content')

    <form method="POST" action="{{ route('matriz-captacao.store') }}">
        @csrf
        @isset($matriz)
            @method('PUT')
        @endisset

        <div class="card p-4">
            @include('matriz_captacao.partials.form')
        </div>
    </form>
@endsection