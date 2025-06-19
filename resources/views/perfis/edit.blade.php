@extends('adminlte::page')
@section('title', 'Editar Perfil')
@section('content_header')
    <h1>Editar Perfil #{{ $perfil->id }}</h1>
@endsection
@section('content')
    @include('perfis.form')
@endsection