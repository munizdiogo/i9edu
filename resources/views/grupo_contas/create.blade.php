@extends('adminlte::page')
@section('title', 'Novo Grupo de Contas')

@section('content_header')
    <h1 class="callout callout-info bg-transparent border-none shadow-none">
        Editar Grupo de Contas
    </h1>
@endsection

@section('content')
    <form action="{{ route('grupo-contas.store') }}" method="POST">
        @csrf
        @include('grupo_contas.partials.form')
    </form>
@endsection
@section('js')
    @include('components.alert-swal-retorno-operacao')
@endsection