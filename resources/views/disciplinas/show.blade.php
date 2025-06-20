@extends('adminlte::page')
@section('content')
    <div class="card">
        <div class="card-body">
            <fieldset disabled>@include('disciplinas.form')</fieldset>
        </div>
        <div class="card-footer text-right">
            <a href="{{ route('disciplinas.index') }}" class="btn btn-default">Voltar</a>
        </div>
    </div>
@endsection