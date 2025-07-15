{{-- resources/views/documentos/show.blade.php --}}
@extends('adminlte::page')
@section('title', 'Visualizar Documento')


@section('content_header')
    <div class="my-4">
        <h1 class="callout callout-info bg-transparent border-none shadow-none p-4 d-inline">Detalhes documento
            #{{ $documento->id }}
        </h1>
        <a href="{{ route('documentos.edit', $documento) }}" class="btn my-0 btn-warning float-right">
            <i class="fas fa-edit"></i> Editar
        </a>
    </div>
@endsection


@section('content')
    <div class="card-body">
        <fieldset disabled>@include('documentos.partials.form')</fieldset>
    </div>
    <div class="m-3 card-footer text-right">
        <a href="{{ route('documentos.index') }}" class="btn btn-default">Voltar</a>
    </div>
@endsection