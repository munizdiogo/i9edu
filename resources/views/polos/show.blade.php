{{-- resources/views/polos/show.blade.php --}}
@extends('adminlte::page')

@section('title', 'Detalhes do Polo')


@section('content_header')
    <div class="my-4">
        <h1 class="callout callout-info bg-transparent border-none shadow-none p-4 d-inline">Detalhes do Polo
            #{{ $polo->id }}</h1>
        <a href="{{ route('polos.edit', $polo) }}" class="btn my-0 btn-warning float-right">
            <i class="fas fa-edit"></i> Editar
        </a>
    </div>
@endsection


@section('content')
    <div class="card-body">
        <fieldset disabled>
            @include('polos.partials.form')
        </fieldset>
    </div>
    <div class="card-footer text-right m-3">
        <a href="{{ route('polos.index') }}" class="btn btn-default">Voltar</a>
    </div>
@endsection