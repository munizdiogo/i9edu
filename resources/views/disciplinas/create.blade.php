@extends('adminlte::page')
@section('content')
    <form action="{{ route('disciplinas.store') }}" method="POST">@csrf
        @include('disciplinas.form')
        <button class="btn btn-primary">Salvar</button>
        <a href="{{ route('disciplinas.index') }}" class="btn btn-default">Voltar</a>
    </form>
@endsection