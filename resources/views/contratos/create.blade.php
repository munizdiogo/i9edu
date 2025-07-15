@extends('adminlte::page')
@section('title', 'Novo Contrato')
@section('content')
    <div class="card">
        <div class="card-header">Novo Contrato</div>
        <div class="card-body">
            <form action="{{ route('contratos.store') }}" method="POST">
                @csrf
                @include('contratos.form')
                <button class="btn btn-primary">Salvar</button>
                <a href="{{ route('contratos.index') }}" class="btn btn-default">Voltar</a>
            </form>
        </div>
    </div>
@endsection