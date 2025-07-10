@extends('adminlte::page')
@section('title', 'Nova Estrutura')

@section('content')
    <div class="card m-4">
        <div class="card-header">
            <h4>Nova Estrutura</h4>
        </div>
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