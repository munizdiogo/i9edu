@extends('adminlte::page')
@section('title', 'Detalhes da Disciplina Base #' . $disciplinas_base->id)

@section('content_header')
    <div class="my-4">
        <h1 class="callout callout-info bg-transparent border-none shadow-none p-4 d-inline">Detalhes da Disciplina Base
            #{{ $disciplinas_base->id }}</h1>
        <a href="{{ route('disciplinas_base.edit', $disciplinas_base) }}" class="btn my-0 btn-warning float-right">
            <i class="fas fa-edit"></i> Editar
        </a>
    </div>
@endsection


@section('content')
    <div class="card">
        <div class="card-body">
            <fieldset disabled>
                @include('disciplinas_base.partials.form')
            </fieldset>
        </div>
        <div class="card-footer text-right">
            <a href="{{ route('disciplinas_base.index') }}" class="btn btn-default">Voltar</a>
        </div>
    </div>
@endsection