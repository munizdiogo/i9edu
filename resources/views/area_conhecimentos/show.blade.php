@extends('adminlte::page')
@section('title', 'Visualizar Área de Conhecimento')

@section('content')
    <form action="{{ route('area_conhecimentos.update', $area_conhecimento) }}" method="POST">
        @csrf @method('PUT')
        @include('area_conhecimentos.partials.form')
        <button type="submit" class="btn btn-primary">Salvar</button>
        <a href="{{ route('area_conhecimentos.index') }}" class="btn btn-secondary">Voltar</a>
    </form>
@endsection


@section('content')
    <div class="card">
        <div class="card-body">
            <p><strong>Código:</strong> {{ $area_conhecimento->codigo }}</p>
            <p><strong>Descrição:</strong> {{ $area_conhecimento->descricao }}</p>
            <p><strong>Status:</strong> {{ $area_conhecimento->status }}</p>
            <a href="{{ route('area_conhecimentos.index') }}" class="btn btn-secondary">Voltar</a>
        </div>
    </div>
@endsection