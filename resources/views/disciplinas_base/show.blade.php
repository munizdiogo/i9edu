@extends('adminlte::page')
@section('title', 'Detalhes da Disciplina Base #' . $disciplinas_base->id)
@section('content_header')
    <h1>Detalhes da Disciplina Base #{{ $disciplinas_base->id }}</h1>
@endsection
@section('content')
    <div class="card">
        <div class="card-body">
            <fieldset disabled>
                @include('disciplinas_base.form')
            </fieldset>
        </div>
        <div class="card-footer text-right">
            <a href="{{ route('disciplinas_base.index') }}" class="btn btn-default">Voltar</a>
        </div>
    </div>
@endsection