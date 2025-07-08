@extends('adminlte::page')
@section('title', 'Detalhes da Restrição')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Detalhes da Restrição do Plano de Pagamento</h3>
        </div>
        <div class="card-body">
            <dl class="row">
                <dt class="col-sm-3">Plano de Pagamento</dt>
                <dd class="col-sm-9">{{ $restricao->plano->nome ?? '-' }}</dd>

                <dt class="col-sm-3">Curso</dt>
                <dd class="col-sm-9">{{ $restricao->curso->nome ?? '-' }}</dd>

                <dt class="col-sm-3">Polo</dt>
                <dd class="col-sm-9">{{ $restricao->polo->nome ?? '-' }}</dd>

                <dt class="col-sm-3">Turma</dt>
                <dd class="col-sm-9">{{ $restricao->turma->nome ?? '-' }}</dd>

                <dt class="col-sm-3">Modalidade</dt>
                <dd class="col-sm-9">{{ $restricao->modalidade ?? '-' }}</dd>

                <dt class="col-sm-3">Criado em</dt>
                <dd class="col-sm-9">{{ $restricao->created_at ? $restricao->created_at->format('d/m/Y H:i') : '-' }}</dd>
            </dl>
        </div>
        <div class="card-footer">
            <a href="{{ route('restricoes_plano_pagamento.edit', $restricao->id) }}" class="btn btn-warning">
                <i class="fa fa-edit"></i> Editar
            </a>
            <a href="{{ route('restricoes_plano_pagamento.index') }}" class="btn btn-default">
                <i class="fa fa-arrow-left"></i> Voltar
            </a>
        </div>
    </div>
@endsection