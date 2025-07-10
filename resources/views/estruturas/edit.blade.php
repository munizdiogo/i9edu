@extends('adminlte::page')
@section('title', 'Editar Estrutura')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Editar Estrutura</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('estruturas.update', $estrutura->id) }}" method="POST">
                @csrf
                @method('PUT')
                @include('estruturas.partials.form')
                <button type="submit" class="btn btn-primary">Salvar</button>
                <a href="{{ route('estruturas.index') }}" class="btn btn-secondary">Voltar</a>
            </form>
        </div>
    </div>
@endsection