@extends('adminlte::page')
@section('title', 'Detalhes da Função #' . $funcao->id)
@section('content')
    <div class="card">
        <div class="card-body">
            <fieldset disabled>@include('funcoes.form')</fieldset>
        </div>
        <div class="card-footer text-right">
            <a href="{{ route('funcoes.index') }}" class="btn btn-default">Voltar</a>
        </div>
    </div>
@endsection