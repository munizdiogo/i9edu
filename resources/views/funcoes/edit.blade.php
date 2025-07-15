@extends('adminlte::page')
@section('title', 'Editar Função')
@section('content_header')<h1>Editar Função #{{ $funcao->id }}</h1>@endsection
@section('content')
    <form action="{{ route('funcoes.update', $funcao) }}" method="POST">@csrf @method('PUT')
        @include('funcoes.partials.form')
    </form>
@endsection