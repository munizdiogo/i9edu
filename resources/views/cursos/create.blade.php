@extends('adminlte::page')
@section('title', 'Novo Curso')

@section('content_header')
    <h1 class="callout callout-info bg-transparent border-none shadow-none">Novo Curso</h1>
@endsection

@section('content')
    <form action="{{ route('cursos.store') }}" method="post">@csrf
        @include('cursos.partials.form')
    </form>
@endsection