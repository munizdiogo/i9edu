@extends('adminlte::page')
@section('title', 'Nova Estrutura')

@section('content_header')
    <h1 class="callout callout-info bg-transparent border-none shadow-none">Nova Estrutura</h1>
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('estruturas.store') }}" method="POST">
                @csrf
                @include('estruturas.partials.form')
                <button type="submit" class="btn btn-primary">Salvar</button>
                <a href="{{ route('estruturas.index') }}" class="btn btn-secondary">Voltar</a>
            </form>
        </div>
    </div>
@endsection