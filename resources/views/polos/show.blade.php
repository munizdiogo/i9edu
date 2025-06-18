{{-- resources/views/polos/show.blade.php --}}
@extends('adminlte::page')

@section('title', 'Detalhes do Polo')

@section('content_header')
    <h1>Detalhes do Polo</h1>
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <fieldset disabled>
                @include('polos.form')
            </fieldset>
        </div>
        <div class="card-footer text-right">
            <a href="{{ route('polos.index') }}" class="btn btn-default">Voltar</a>
        </div>
    </div>
@endsection