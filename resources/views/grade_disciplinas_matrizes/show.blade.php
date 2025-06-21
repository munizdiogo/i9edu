@extends('adminlte::page')
@section('title', 'Detalhes da Vínculo Disciplina x Matriz Curricular')
@section('content_header')
    <h1>Detalhes da Disciplina x Matriz Curricular #{{ $grade_disciplinas_matrize->id }}</h1>
@endsection
@section('content')
    <div class="card">
        <div class="card-body">
            <fieldset disabled>
                @include('grade_disciplinas_matrizes.form')
            </fieldset>
        </div>
        <div class="card-footer text-right">
            <a href="{{ route('grade_disciplinas_matrizes.index') }}" class="btn btn-default">Voltar</a>
        </div>
    </div>
@endsection