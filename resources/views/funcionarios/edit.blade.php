@extends('adminlte::page')
@section('title', 'Editar Funcionário #' . $funcionario->id)
@section('content_header')<h1>Editar Funcionário #{{ $funcionario->id }}</h1>@endsection
@section('content')
    <form action="{{ route('funcionarios.update', $funcionario) }}" method="POST">@csrf @method('PUT')
        @include('funcionarios.form')
    </form>
@endsection