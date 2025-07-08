@extends('adminlte::page')
@section('title', 'Novo Plano de Contas')

@section('content')
    <div class="container">
        <h1 class="mb-3">Novo Plano de Contas</h1>
        <form action="{{ route('plano-contas.store') }}" method="POST">
            @csrf
            @include('plano_contas.form')
            <button type="submit" class="btn btn-success">Salvar</button>
            <a href="{{ route('plano-contas.index') }}" class="btn btn-secondary">Voltar</a>
        </form>
    </div>
@endsection