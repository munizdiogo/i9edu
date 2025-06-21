@extends('adminlte::page')
@section('title', 'Editar Disciplina #' . $disciplina->id)
@section('content_header')<h1>Editar Disciplina #{{ $disciplina->id }}</h1>@endsection
@section('content')
    <form action="{{ route('disciplinas.update', $disciplina) }}" method="POST">@csrf @method('PUT')
        @include('disciplinas.form')
        <button class="btn btn-primary">Atualizar</button>
        <a href="{{ route('disciplinas.index') }}" class="btn btn-default">Voltar</a>
    </form>
@endsection