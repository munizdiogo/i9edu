@extends('adminlte::page')
@section('title', 'Editar Contrato')
@section('content')
    <div class="card">
        <div class="card-header">Editar Transação</div>
        <div class="card-body">
            <form action="{{ route('transacoes.update', $transacao->id) }}" method="POST">
                @csrf
                @method('PUT')
                @include('transacoes.form')
                <button class="btn btn-primary">Salvar</button>
                <a href="{{ route('transacoes.index') }}" class="btn btn-default">Voltar</a>
            </form>
        </div>
    </div>
@endsection