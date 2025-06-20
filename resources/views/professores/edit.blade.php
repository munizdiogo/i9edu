@extends('adminlte::page')
@section('title', 'Editar Professor #' . $professor->id)
@section('content')
    <form action="{{ route('professores.update', $professor) }}" method="POST">@csrf @method('PUT')
        @include('professores.form')
        <button class="btn btn-primary">Atualizar</button>
        <a href="{{ route('professores.index') }}" class="btn btn-default">Voltar</a>
    </form>
@endsection