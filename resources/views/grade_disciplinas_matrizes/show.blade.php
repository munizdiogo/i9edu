@extends('adminlte::page')
@section('title', 'Detalhes do Vínculo #' . $grade_disciplinas_matrize->id)
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