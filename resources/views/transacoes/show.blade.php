@extends('adminlte::page')
@section('title', 'Detalhes da Transação')
@section('content_header')
<h1>Detalhes da Transação</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <dl class="row">
                <dt class="col-sm-3">Aluno</dt>
                <dd class="col-sm-9">{{ $transacao->matricula->aluno->nome ?? '-' }}</dd>
                <dt class="col-sm-3">Pagador</dt>
                <dd class="col-sm-9">{{ $transacao->pagador->nome ?? '-' }}</dd>
                <dt class="col-sm-3">Descrição</dt>
                <dd class="col-sm-9">{{ $transacao->descricao }}</dd>
                <dt class="col-sm-3">Competência</dt>
                <dd class="col-sm-9">{{ $transacao->competencia }}</dd>
                <dt class="col-sm-3">Data Vencimento</dt>
                <dd class="col-sm-9">{{ optional($transacao->data_vencimento)->format('d/m/Y') }}</dd>
                <dt class="col-sm-3">Valor</dt>
                <dd class="col-sm-9">{{ number_format($transacao->valor, 2, ',', '.') }}</dd>
                <dt class="col-sm-3">Valor Pago</dt>
                <dd class="col-sm-9">{{ number_format($transacao->valor_pago ?? 0, 2, ',', '.') }}</dd>
                <dt class="col-sm-3">Situação</dt>
                <dd class="col-sm-9">{{ $transacao->situacao }}</dd>
                <dt class="col-sm-3">Status</dt>
                <dd class="col-sm-9">{{ ucfirst($transacao->status) }}</dd>
                <!-- Adicione outros campos relevantes -->
            </dl>
            <a href="{{ route('transacoes.index') }}" class="btn btn-default">Voltar</a>
        </div>
    </div>
@endsection