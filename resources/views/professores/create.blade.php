@extends('adminlte::page')
@section('title', 'Novo Professor')
@section('content')
    <form action="{{ route('professores.store') }}" method="POST">@csrf
        @include('professores.form')
        <button class="btn btn-primary">Salvar</button>
        <a href="{{ route('professores.index') }}" class="btn btn-default">Voltar</a>
    </form>
@endsection