@extends('adminlte::page')
@section('title', 'Editar Perfil')
@section('content_header')
    <h1>Editar Perfil #{{ $profile->id }}</h1>
@endsection
@section('content')
    @include('profiles.form')
@endsection