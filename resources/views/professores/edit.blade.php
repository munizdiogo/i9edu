@extends('adminlte::page')
@section('title', 'Editar Professor #' . $professor->id)
@section('content_header')<h1>Editar Professor #{{ $professor->id }}</h1>@endsection
@section('content')
    <form action="{{ route('professores.update', $professor) }}" method="POST">@csrf @method('PUT')
        @include('professores.form')
    </form>
@endsection