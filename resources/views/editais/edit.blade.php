@extends('adminlte::page')

@section('title', 'Editar Edital #' . $edital->id)

@section('content_header')
    <h1>Editar Edital #{{ $edital->id }}</h1>
@endsection

@section('content')
    <form action="{{ route('editais.update', $edital) }}" method="post">
        @csrf
        @method('PUT')
        @include('editais.form')
    </form>
@endsection