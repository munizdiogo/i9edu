@extends('adminlte::page')
@section('title', 'Novo Curso')
@section('content_header')<h1>Novo Curso</h1>@endsection
@section('content')<form action="{{ route('cursos.store') }}" method="post">@csrf @include('cursos.form')</form>
@endsection