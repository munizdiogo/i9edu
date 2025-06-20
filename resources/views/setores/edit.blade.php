@extends('adminlte::page')
@section('title', 'Editar Setor #' . $setor->id)
@section('content_header')<h1>Editar Setor #{{ $setor->id }}</h1>@endsection
@section('content')
    <form action="{{ route('setores.update', $setor) }}" method="POST">@csrf @method('PUT')
        @include('setores.form')
    </form>
@endsection