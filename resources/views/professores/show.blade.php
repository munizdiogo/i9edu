@extends('adminlte::page')
@section('title', 'Detalhes do Professor #' . $professor->id)
@section('content_header')
    <h1>Detalhes do Professor #{{ $professor->id }}</h1>
@endsection
@section('content')
    <div class="card">
        <div class="card-body">
            <fieldset disabled>@include('professores.form')</fieldset>
        </div>
        <div class="card-footer text-right">
            <a href="{{ route('professores.index') }}" class="btn btn-default">Voltar</a>
        </div>
    </div>
@endsection