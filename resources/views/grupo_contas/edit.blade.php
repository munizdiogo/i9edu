@extends('adminlte::page')
@section('title', 'Editar Grupo de Contas')

@section('content_header')
    <h1 class="callout callout-info bg-transparent border-none shadow-none">
        Editar Grupo de Contas #{{ $grupoConta->id }}
    </h1>
@endsection

@section('content')
    <form action="{{ route('grupo-contas.update', $grupoConta->id) }}" method="POST">
        @csrf
        @method('PUT')
        @include('grupo_contas.partials.form', ['grupoConta' => $grupoConta])
    </form>
@endsection