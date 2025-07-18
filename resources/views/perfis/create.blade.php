@extends('adminlte::page')
@section('title', 'Novo Perfil')

@section('content_header')
    <h1 class="callout callout-info bg-transparent border-none shadow-none">Novo perfil</h1>
@endsection

@section('content')
    @include('perfis.partials.form')
@endsection