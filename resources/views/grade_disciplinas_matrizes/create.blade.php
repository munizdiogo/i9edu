@extends('adminlte::page')
@section('title', 'Novo Vínculo')
@section('content')
    <form action="{{ route('grade_disciplinas_matrizes.store') }}" method="POST">
        @csrf
        @include('grade_disciplinas_matrizes.form')
        <button class="btn btn-primary">Salvar</button>
        <a href="{{ route('grade_disciplinas_matrizes.index') }}" class="btn btn-default">Voltar</a>
    </form>
@endsection