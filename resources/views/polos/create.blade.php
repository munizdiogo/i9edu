{{-- resources/views/polos/create.blade.php --}}
@extends('adminlte::page')

@section('title', 'Novo Polo')

@section('content_header')
    <h1>Novo Polo</h1>
@endsection

@section('content')
    @include('polos.form')
@endsection