@extends('adminlte::page')
@section('title', 'Visualizar Cupom')
@section('content')
    <div class="card">
        <div class="card-header">
            <h4>{{ $cupom->codigo }}</h4>
        </div>
        <div class="card-body">
            <p><b>Descrição:</b> {{ $cupom->descricao }}</p>
            <p><b>Período:</b> {{ \Carbon\Carbon::parse($cupom->data_inicio)->format('d/m/Y') }} a
                {{ \Carbon\Carbon::parse($cupom->data_fim)->format('d/m/Y') }}</p>
            <p><b>Convênio:</b> {{ $cupom->convenio->descricao ?? '-' }}</p>
            <p><b>Qtd Máxima:</b> {{ $cupom->quantidade_maxima }}</p>
            <p><b>Status:</b> {{ $cupom->status }}</p>
            <p><b>Criar Convênio Pagador:</b> {{ $cupom->criar_convenio_pagador ? 'Sim' : 'Não' }}</p>
            <p><b>Validar Matrícula Ativa:</b> {{ $cupom->validar_matricula_ativa ? 'Sim' : 'Não' }}</p>
            <a href="{{ route('cupons.index') }}" class="btn btn-default">Voltar</a>
        </div>
    </div>
@endsection