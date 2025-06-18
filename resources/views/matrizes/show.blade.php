@extends('adminlte::page')
@section('title', 'Detalhes da Matriz Curricular')
@section('content_header')<h1>Detalhes da Matriz #{{ $matriz->id }}</h1>@endsection
@section('content')<div class="card">
    <div class="card-body">
        <fieldset disabled>@include('matrizes.form')</fieldset>
    </div>
    <div class="card-footer text-right"><a href="{{ route('matrizes.index') }}" class="btn btn-default">Voltar</a></div>
</div>@endsection