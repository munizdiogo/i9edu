@extends('adminlte::page')
@section('title', 'Editar Restrição')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Editar Restrição de Plano de Pagamento</h3>
        </div>
        <form action="{{ route('restricoes_plano_pagamento.update', $restricao->id) }}" method="POST">
            @csrf
            @method('PUT')
            @include('restricoes_plano_pagamento.form')
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Salvar</button>
                <a href="{{ route('restricoes_plano_pagamento.index') }}" class="btn btn-default">Voltar</a>
            </div>
        </form>
    </div>
@endsection