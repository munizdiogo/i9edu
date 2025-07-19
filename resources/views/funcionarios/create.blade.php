@extends('adminlte::page')
@section('title', 'Novo Funcionário')

@section('content_header')
    <h1 class="callout callout-info bg-transparent border-none shadow-none">Novo Funcionário</h1>
@endsection

@section('content')
    <form action="{{ route('funcionarios.store') }}" method="POST">@csrf
        @include('funcionarios.partials.form')
    </form>
@endsection