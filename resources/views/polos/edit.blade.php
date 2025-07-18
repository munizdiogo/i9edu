{{-- resources/views/polos/edit.blade.php --}}
@extends('adminlte::page')

@section('title', 'Editar Polo')

@section('content_header')
    <h1 class="callout callout-info bg-transparent border-none shadow-none">Editar Polo #{{ $polo->id }}</h1>
@endsection

@section('content_header')
    <h1>Editar Polo #{{ $polo->id }}</h1>
@endsection

@section('content')
    @include('polos.partials.form')
@endsection