@extends('adminlte::page')
@section('title', 'Editar Funcionário #' . $funcionario->id)

@section('content_header')
    <h1 class="callout callout-info bg-transparent border-none shadow-none">Editar Funcionário #{{ $funcionario->id }}</h1>
@endsection

@section('content')
    <form action="{{ route('funcionarios.update', $funcionario) }}" method="POST">@csrf @method('PUT')
        @include('funcionarios.partials.form')
    </form>
@endsection