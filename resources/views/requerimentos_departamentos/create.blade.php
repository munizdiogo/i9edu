@extends('adminlte::page')
@section('title', 'Novo Requerimento')


@section('content_header')
    <h1 class="callout callout-info bg-transparent border-none shadow-none">Novo Departamento</h1>
@endsection


@section('content')
    <form action="{{ route('requerimentos_departamentos.store') }}" method="POST">
        @csrf
        @include('requerimentos_departamentos.partials.form')
    </form>
@endsection