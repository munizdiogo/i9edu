@extends('adminlte::page')
@section('title', 'Editar Perfil')

@section('content_header')
    <h1 class="callout callout-info bg-transparent border-none shadow-none">Editar Perfil #{{ $perfil->id }}</h1>
@endsection

@section('content')
    <form action="perfis.update" method="post" enctype="multipart/form-data"> @csrf @method('PUT')
        @include('perfis.partials.form')
    </form>
@endsection