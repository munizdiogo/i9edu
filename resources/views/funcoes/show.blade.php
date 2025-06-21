@extends('adminlte::page')
@section('title', 'Detalhes da Função #' . $funcao->id)
@section('content_header')<h1>Detalhes da Função #{{ $funcao->id }}</h1>@endsection
@section('content')
    <div class="card">
        <div class="card-body">
            <fieldset disabled>
                @include('funcoes.form')
            </fieldset>
        </div>
        <div class="card-footer text-right">
            <a href="{{ route('funcoes.index') }}" class="btn btn-default">Voltar</a>
        </div>
    </div>
@endsection