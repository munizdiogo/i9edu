@extends('adminlte::page')
@section('title', 'Visualizar Área de Conhecimento')

@section('content_header')
    <div class="my-4">
        <h1 class="callout callout-info bg-transparent border-none shadow-none p-4 d-inline">Detalhes da Área do
            Conhecimento
            #{{ $area_conhecimento->id }}</h1>
        <a href="{{ route('area_conhecimentos.edit', $area_conhecimento) }}" class="btn my-0 btn-warning float-right">
            <i class="fas fa-edit"></i> Editar
        </a>
    </div>
@endsection

@section('content')
    <form action="{{ route('area_conhecimentos.update', $area_conhecimento) }}" method="POST">
        @csrf @method('PUT')
        @include('area_conhecimentos.partials.form')
    </form>
    <div class=" card-footer text-right">
        <a href="{{ route('area_conhecimentos.index') }}" class="btn btn-default">Voltar</a>
    </div>
@endsection