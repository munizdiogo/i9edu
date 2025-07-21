@extends('adminlte::page')
@section('title', 'Visualizar Contrato')


@section('content_header')
    <div class="my-4">
        <h1 class="callout callout-info bg-transparent border-none shadow-none p-4 d-inline">Detalhes do Contrato
            #{{ $contrato->id }}</h1>
        <a href="{{ route('contratos.edit', $contrato) }}" class="btn my-0 btn-warning float-right">
            <i class="fas fa-edit"></i> Editar
        </a>
    </div>
@endsection


@section('content')
    <div class="card">
        <div class="card-body">
            <dl class="row">
                <dt class="col-md-3">Aluno</dt>
                <dd class="col-md-9">{{ $contrato->perfil->nome ?? '-' }}</dd>

                <dt class="col-md-3">Curso</dt>
                <dd class="col-md-9">{{ $contrato->curso->nome ?? '-' }}</dd>

                <dt class="col-md-3">Matrícula</dt>
                <dd class="col-md-9">{{ $contrato->matricula->id ?? '-' }}</dd>

                <dt class="col-md-3">Turma</dt>
                <dd class="col-md-9">{{ $contrato->turma->nome ?? '-' }}</dd>

                <dt class="col-md-3">Período Letivo</dt>
                <dd class="col-md-9">{{ $contrato->periodoLetivo->descricao ?? '-' }}</dd>

                <dt class="col-md-3">Plano de Pagamento</dt>
                <dd class="col-md-9">{{ $contrato->planoPagamento->nome ?? '-' }}</dd>

                <dt class="col-md-3">Status</dt>
                <dd class="col-md-9">{{ $contrato->status }}</dd>

                <dt class="col-md-3">Data Aceite</dt>
                <dd class="col-md-9">{{ $contrato->data_aceite }}</dd>

                <dt class="col-md-3">Início Vigência</dt>
                <dd class="col-md-9">{{ $contrato->data_inicio_vigencia }}</dd>

                <dt class="col-md-3">Fim Vigência</dt>
                <dd class="col-md-9">{{ $contrato->data_fim_vigencia }}</dd>

                <dt class="col-md-3">Cancelado por</dt>
                <dd class="col-md-9">{{ $contrato->cancelado_por }}</dd>

                <dt class="col-md-3">Observação</dt>
                <dd class="col-md-9">{{ $contrato->observacao }}</dd>
            </dl>
            <a href="{{ route('contratos.index') }}" class="btn btn-default">Voltar</a>
        </div>
    </div>
@endsection