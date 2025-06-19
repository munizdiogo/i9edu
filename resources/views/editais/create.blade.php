@extends('adminlte::page')

@section('title', 'Novo Edital')

@section('content_header')
    <h1>Novo Edital</h1>
@endsection

@section('content')
    <form action="{{ route('editais.store') }}" method="post">
        @csrf
        @include('editais.form')
    </form>
@endsection