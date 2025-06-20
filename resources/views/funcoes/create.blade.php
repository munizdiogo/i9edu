@extends('adminlte::page')
@section('title', 'Nova Função')
@section('content')
    <form action="{{ route('funcoes.store') }}" method="POST">@csrf
        @include('funcoes.form')
    </form>
@endsection