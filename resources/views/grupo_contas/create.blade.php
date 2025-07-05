@extends('adminlte::page')
@section('title', 'Novo Grupo de Contas')

@section('content')
    <form action="{{ route('grupo-contas.store') }}" method="POST">
        @csrf
        @include('grupo_contas._form')
        <button class="btn btn-primary">Salvar</button>
        <a href="{{ route('grupo-contas.index') }}" class="btn btn-default">Voltar</a>
    </form>
@endsection
@section('js')
    @include('components.alert-swal-retorno-operacao')
@endsection