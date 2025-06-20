@extends('adminlte::page')
@section('title', 'Novo Funcionário')
@section('content')
    <form action="{{ route('funcionarios.store') }}" method="POST">@csrf
        @include('funcionarios.form')
    </form>
@endsection