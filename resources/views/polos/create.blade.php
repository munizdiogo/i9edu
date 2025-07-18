{{-- resources/views/polos/create.blade.php --}}
@extends('adminlte::page')

@section('title', 'Novo Polo')

@section('content_header')
    <h1 class="callout callout-info bg-transparent border-none shadow-none">Novo polo</h1>
@endsection

@section('content')
    @include('polos.partials.form')
@endsection