@extends('adminlte::page')
@section('title', 'Nova Matriz Curricular')
@section('content_header')<h1>Nova Matriz Curricular</h1>@endsection
@section('content')<form action="{{ route('matrizes.store') }}" method="post">@csrf @include('matrizes.form')</form>
@endsection