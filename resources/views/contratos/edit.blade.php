@extends('adminlte::page')
@section('title', 'Editar Contrato')

@section('content_header')
    <h1 class="callout callout-info bg-transparent border-none shadow-none">Editar Contrato #{{ $contrato->id }}</h1>
@endsection


@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('contratos.update', $contrato->id) }}" method="POST">
                @csrf
                @method('PUT')
                @include('contratos.partials.form')
            </form>
        </div>
    </div>
@endsection