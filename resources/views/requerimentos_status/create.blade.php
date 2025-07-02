@extends('adminlte::page')
@section('title', 'Novo Status de Requerimento')
@section('content')
    <div class="container">
        <form action="{{ route('requerimentos-status.store') }}" method="POST">
            @csrf
            @include('requerimentos_status.partials.form')
            <button type="submit" class="btn btn-primary">Salvar</button>
            <a href="{{ route('requerimentos-status.index') }}" class="btn btn-default">Cancelar</a>
        </form>
    </div>
@endsection