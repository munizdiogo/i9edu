@extends('adminlte::page')
@section('title', 'Detalhes da Vínculo Disciplina x Matriz Curricular')

@section('content_header')
    <div class="my-4">
        <h1 class="callout callout-info bg-transparent border-none shadow-none p-4 d-inline">
            Detalhes da Disciplina x Matriz Curricular #{{ $grade_disciplinas_matrize->id }}
        </h1>
        <a href="{{ route('grade_disciplinas_matrizes.edit', $grade_disciplinas_matrize) }}"
            class="btn my-0 btn-warning float-right">
            <i class="fas fa-edit"></i> Editar
        </a>
    </div>
@endsection




@section('content')
    <fieldset disabled>
        @include('grade_disciplinas_matrizes.partials.form')
    </fieldset>
    <div class="card-footer text-right">
        <a href="{{ route('grade_disciplinas_matrizes.index') }}" class="btn btn-default">Voltar</a>
    </div>
@endsection