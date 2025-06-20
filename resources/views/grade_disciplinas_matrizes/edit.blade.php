@extends('adminlte::page')
@section('title', 'Editar Vínculo #' . $grade_disciplinas_matrize->id)
@section('content')
    <form action="{{ route('grade_disciplinas_matrizes.update', $grade_disciplinas_matrize) }}" method="POST">
        @csrf @method('PUT')
        @include('grade_disciplinas_matrizes.form')
        <button class="btn btn-primary">Atualizar</button>
        <a href="{{ route('grade_disciplinas_matrizes.index') }}" class="btn btn-default">Voltar</a>
    </form>
@endsection