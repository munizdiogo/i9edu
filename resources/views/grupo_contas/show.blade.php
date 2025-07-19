@extends('adminlte::page')
@section('title', 'Grupo de Contas: #{{ $grupoConta->id }}')

@section('content_header')
    <div class="my-4">
        <h1 class="callout callout-info bg-transparent border-none shadow-none p-4 d-inline">
            Detalhes da Matrícula #{{ $grupoConta->id }}
        </h1>
        <a href="{{ route('grupo-contas.edit', $grupoConta) }}" class="btn my-0 btn-warning float-right">
            <i class="fas fa-edit"></i> Editar
        </a>
    </div>
@endsection


@section('content')
    <fieldset disabled>
        <form action="#">
            @include('grupo_contas.partials.form', ['grupoConta' => $grupoConta])
        </form>
    </fieldset>
    <div class="card-footer text-right">
        <a href="{{ route('grupo-contas.index') }}" class="btn btn-default">Voltar</a>
    </div>
@endsection