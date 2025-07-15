@extends('adminlte::page')
@section('title', 'Detalhes do Setor #' . $setor->id)

@section('content_header')
    <div class="my-4">
        <h1 class="callout callout-info bg-transparent border-none shadow-none p-4 d-inline">Detalhes Setor
            #{{ $setor->id }}
        </h1>
        <a href="{{ route('setores.edit', $setor) }}" class="btn my-0 btn-warning float-right">
            <i class="fas fa-edit"></i> Editar
        </a>
    </div>
@endsection


@section('content')
    <div class="card-body">
        <fieldset disabled>@include('setores.partials.form')</fieldset>
    </div>
    <div class="card-footer text-right">
        <a href="{{ route('setores.index') }}" class="btn btn-default">Voltar</a>
    </div>
@endsection