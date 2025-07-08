@extends('adminlte::page')
@section('title', 'Editar Plano de Contas')

@section('content')
    <div class="container">
        <h1 class="mb-3">Editar Plano de Contas</h1>
        <form action="{{ route('plano-contas.update', $planoConta->id) }}" method="POST">
            @csrf
            @method('PUT')
            @include('plano_contas.form', ['planoConta' => $planoConta])
            <button type="submit" class="btn btn-primary">Atualizar</button>
            <a href="{{ route('plano-contas.index') }}" class="btn btn-secondary">Voltar</a>
        </form>
    </div>
@endsection