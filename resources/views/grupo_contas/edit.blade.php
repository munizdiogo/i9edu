@extends('adminlte::page')
@section('title', 'Editar Grupo de Contas')

@section('content')
    <form action="{{ route('grupo-contas.update', $grupoConta->id) }}" method="POST">
        @csrf
        @method('PUT')
        @include('grupo_contas._form', ['grupoConta' => $grupoConta])
        <button class="btn btn-primary">Atualizar</button>
        <a href="{{ route('grupo-contas.index') }}" class="btn btn-default">Voltar</a>
    </form>
@endsection