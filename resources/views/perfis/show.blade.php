@extends('adminlte::page')

@section('title', 'Detalhes do Perfil')

@section('content_header')
    <div class="my-4">
        <h1 class="callout callout-info bg-transparent border-none shadow-none p-4 d-inline">Detalhes do Perfil
            #{{ $perfil->id }}</h1>
        <a href="{{ route('perfis.edit', $perfil) }}" class="btn my-0 btn-warning float-right">
            <i class="fas fa-edit"></i> Editar
        </a>
    </div>
@endsection


@section('content')
    <div class="card-body">
        <fieldset disabled>
            @include('perfis.partials.form')
        </fieldset>
    </div>
    <div class="card-footer text-right m-3">
        <a href="{{ route('perfis.index') }}" class="btn btn-default">Voltar</a>
    </div>
@endsection