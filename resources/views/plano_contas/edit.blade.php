@extends('adminlte::page')
@section('title', 'Editar Plano de Contas')

@section('content_header')
    <h1 class="callout callout-info bg-transparent border-none shadow-none">
        Editar Plano de Contas #{{ $plano_conta->id }}
    </h1>
@endsection


@section('content')
    <form action="{{ route('plano-contas.update', $plano_conta->id) }}" method="POST">
        @csrf
        @method('PUT')
        @include('plano_contas.partials.form', ['plano_conta' => $plano_conta])
    </form>
@endsection