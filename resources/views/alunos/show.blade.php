@extends('adminlte::page')
@section('title', 'Detalhes do Aluno')
@section('content_header')<h1>Detalhes do Aluno #{{ $aluno->id }}</h1>@endsection
@section('content')
    <div class="card">
        <div class="card-body">
            <fieldset disabled>
                @include('alunos.form')
            </fieldset>
        </div>
        <div class="card-footer text-right">
            <a href="{{ route('alunos.index') }}" class="btn btn-default">Voltar</a>
        </div>
    </div>
@endsection