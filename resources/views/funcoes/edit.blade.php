@extends('adminlte::page')
@section('title', 'Editar Função #' . $funcao->id)
@section('content')
    <form action="{{ route('funcoes.update', $funcao) }}" method="POST">@csrf @method('PUT')
        @include('funcoes.form')
    </form>
@endsection