@extends('adminlte::page')
@section('title', 'Visualizar Cupom')


@section('content_header')
    <div class="my-4">
        <h1 class="callout callout-info bg-transparent border-none shadow-none p-4 d-inline">Detalhes do Cupom
            #{{ $cupom->id }}</h1>
        <a href="{{ route('cupons.edit', $cupom) }}" class="btn my-0 btn-warning float-right">
            <i class="fas fa-edit"></i> Editar
        </a>
    </div>
@endsection


@section('content')
    <div class="card">
        <div class="card-header">
            <h4>{{ $cupom->codigo }}</h4>
        </div>
        <div class="card-body">
            <p>
                <b>Descrição:</b>
                {{ $cupom->descricao }}
            </p>
            <p>
                <b>Período:</b>
                {{ \Carbon\Carbon::parse($cupom->data_inicio)->format('d/m/Y') }} a
                {{ \Carbon\Carbon::parse($cupom->data_fim)->format('d/m/Y') }}
            </p>
            <p>
                <b>Convênio:</b>
                {{ $cupom->convenio->descricao ?? '-' }}
            </p>
            <p>
                <b>Qtd Máxima:</b>
                {{ $cupom->quantidade_maxima }}
            </p>
            <p>
                <b>Status:</b>
                {{ $cupom->status }}
            </p>
            <p>
                <b>Criar Convênio Pagador:</b>
                {{ $cupom->criar_convenio_pagador ? 'Sim' : 'Não' }}
            </p>
            <p>
                <b>Validar Matrícula Ativa:</b>
                {{ $cupom->validar_matricula_ativa ? 'Sim' : 'Não' }}
            </p>
        </div>
    </div>
    <div class="card-footer text-right"><a href="{{ route('cupons.index') }}" class="btn btn-default">Voltar</a></div>
@endsection