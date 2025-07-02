@extends('adminlte::page')
@section('title', 'Editar Status de Requerimento')
@section('content')
    <div class="container">
        <form action="{{ route('requerimentos-status.update', $requerimento_status->id) }}" method="POST">
            @csrf
            @method('PUT')
            @include('requerimentos_status.partials.form')
            <button type="submit" class="btn btn-primary">Atualizar</button>
            <a href="{{ route('requerimentos-status.index') }}" class="btn btn-default">Cancelar</a>
        </form>
    </div>
@endsection