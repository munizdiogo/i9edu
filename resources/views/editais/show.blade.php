@extends('adminlte::page')

@section('title', 'Detalhes do Edital #' . $edital->id)

@section('content_header')
    <h1>Detalhes do Edital #{{ $edital->id }}</h1>
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <fieldset disabled>
                @include('editais.form')
            </fieldset>
        </div>
        <div class="card-footer text-right">
            <a href="{{ route('editais.index') }}" class="btn btn-default">Voltar</a>
        </div>
    </div>
@endsection