@extends('adminlte::page')
@section('title', 'Nova Estrutura')

@section('content_header')
    <h1 class="callout callout-info bg-transparent border-none shadow-none">Nova Estrutura</h1>
@endsection

@section('content')
    <form action="{{ route('estruturas.store') }}" method="POST">
        <div class="card">
            <div class="card-body">
                @csrf
                @include('estruturas.partials.form')
            </div>
        </div>
        <div class="card-footer text-right">
            <a href="{{ route('estruturas.index') }}" class="btn btn-default">Voltar</a>
            <button type="submit" class="btn btn-success">Salvar</button>
        </div>
    </form>
@endsection