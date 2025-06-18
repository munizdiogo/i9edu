@extends('adminlte::page')
@section('title', 'Detalhes do Período Letivo')
@section('content_header')<h1>Detalhes do Período #{{ $periodo->id }}</h1>@endsection
@section('content')
    <div class="card">
        <div class="card-body">
            <fieldset disabled>
                @include('periodos.form')
            </fieldset>
        </div>
        <div class="card-footer text-right">
            <a href="{{ route('periodos.index') }}" class="btn btn-default">Voltar</a>
        </div>
    </div>
@endsection