@extends('adminlte::page')
@section('title', 'Grupo de Contas: #{{ $grupoConta->id }}')

@section('content')
    <fieldset disabled>
        <form action="#">
            @include('grupo_contas._form', ['grupoConta' => $grupoConta])
        </form>
    </fieldset>
    <a href="{{ route('grupo-contas.index') }}" class="btn btn-default">Voltar</a>
@endsection