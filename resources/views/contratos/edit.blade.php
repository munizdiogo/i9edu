@extends('adminlte::page')
@section('title', 'Editar Contrato')
@section('content')
    <div class="card">
        <div class="card-header">Editar Contrato</div>
        <div class="card-body">
            <form action="{{ route('contratos.update', $contratos->id) }}" method="POST">
                @csrf
                @method('PUT')
                @include('contratos.form')
                <button class="btn btn-primary">Salvar</button>
                <a href="{{ route('contratos.index') }}" class="btn btn-default">Voltar</a>
            </form>
        </div>
    </div>
@endsection