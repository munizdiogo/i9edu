@extends('adminlte::page')
@section('title', 'Novo Setor')
@section('content')
    <form action="{{ route('setores.store') }}" method="POST">@csrf
        @include('setores.form')
    </form>
@endsection