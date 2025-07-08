@extends('adminlte::page')
@section('title', 'Editar Plano de Contas')

@section('content')
    <div class="container">
        <h1 class="mb-3">Editar Plano de Contas</h1>
        <form action="{{ route('plano-contas.update', $plano_conta->id) }}" method="POST">
            @csrf
            @method('PUT')
            @include('plano_contas.form', ['plano_conta' => $plano_conta])
        </form>
    </div>
@endsection