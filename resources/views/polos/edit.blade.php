{{-- resources/views/polos/edit.blade.php --}}
@extends('adminlte::page')

@section('title', 'Editar Polo')

@section('content_header')
    <h1>Editar Polo #{{ $polo->id }}</h1>
@endsection

@section('content')
    @include('polos.form')
@endsection