@extends('adminlte::page')
@section('title', 'Detalhes da Matrícula #' . $matricula->id)

@section('content_header')
    <div class="my-4">
        <h1 class="callout callout-info bg-transparent border-none shadow-none p-4 d-inline">
            Detalhes da Matrícula #{{ $matricula->id }}
        </h1>
        <a href="{{ route('matriculas.edit', $matricula) }}" class="btn my-0 btn-warning float-right">
            <i class="fas fa-edit"></i> Editar
        </a>
    </div>
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <fieldset disabled>
                @include('matriculas.partials.form')
            </fieldset>
        </div>
        <div class="card-footer text-right">
            <a href="{{ route('matriculas.index') }}" class="btn btn-default">Voltar</a>
        </div>
    </div>
@endsection