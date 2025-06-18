@extends('adminlte::page')
@section('title', 'Novo Período Letivo')
@section('content_header')<h1>Novo Período Letivo</h1>@endsection
@section('content')
    <form action="{{ route('periodos.store') }}" method="post">
        @csrf
        @include('periodos.form')
    </form>
@endsection