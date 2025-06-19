@extends('adminlte::page')

@section('title', 'Detalhes do Curso Ingresso #' . $admissao->id)

@section('content_header')
    <h1>Detalhes do Curso Ingresso #{{ $admissao->id }}</h1>
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <fieldset disabled>
                @include('admissoes.form')
            </fieldset>
        </div>
        <div class="card-footer text-right">
            <a href="{{ route('admissoes.index') }}" class="btn btn-default">Voltar</a>
        </div>
    </div>
@endsection