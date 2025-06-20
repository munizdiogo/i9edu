@extends('adminlte::page')
@section('title', 'Visualizar Área de Conhecimento')
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