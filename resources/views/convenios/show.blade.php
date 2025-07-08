@extends('adminlte::page')
@section('title', 'Visualizar Convênio')

@section('content')
    <h1>Convênio: {{ $convenio->descricao }}</h1>
    <div class="card">
        <div class="card-body">
            <dl class="row">
                <dt class="col-md-3">Descrição:</dt>
                <dd class="col-md-9">{{ $convenio->descricao }}</dd>

                <dt class="col-md-3">Modalidade:</dt>
                <dd class="col-md-9">{{ $convenio->modalidade }}</dd>

                <dt class="col-md-3">Tipo de Financiamento:</dt>
                <dd class="col-md-9">{{ $convenio->tipo_financiamento ?? '-' }}</dd>

                <dt class="col-md-3">Plano de Conta:</dt>
                <dd class="col-md-9">{{ optional($convenio->planoConta)->descricao }}</dd>

                <dt class="col-md-3">Valor:</dt>
                <dd class="col-md-9">R$ {{ number_format($convenio->valor, 2, ',', '.') }}</dd>

                <dt class="col-md-3">Tipo:</dt>
                <dd class="col-md-9">{{ $convenio->tipo }}</dd>

                <dt class="col-md-3">Status:</dt>
                <dd class="col-md-9">{{ $convenio->status }}</dd>

                <dt class="col-md-3">Perde convênio após vencimento/data limite?</dt>
                <dd class="col-md-9">{{ $convenio->perde_convenio ? 'Sim' : 'Não' }}</dd>

                <dt class="col-md-3">Pagamento até:</dt>
                <dd class="col-md-9">{{ $convenio->pagamento_ate }}</dd>

                <dt class="col-md-3">Dia Limite:</dt>
                <dd class="col-md-9">{{ $convenio->dia_limite ?? '-' }}</dd>

                <dt class="col-md-3">Tipo Vencimento:</dt>
                <dd class="col-md-9">{{ $convenio->tipo_vencimento ?? '-' }}</dd>

                <dt class="col-md-3">Vigência:</dt>
                <dd class="col-md-9">
                    {{ $convenio->inicio ? \Carbon\Carbon::parse($convenio->inicio)->format('d/m/Y') : '-' }}
                    até
                    {{ $convenio->fim ? \Carbon\Carbon::parse($convenio->fim)->format('d/m/Y') : '-' }}
                </dd>

                <dt class="col-md-3">Instrução Bancária:</dt>
                <dd class="col-md-9">{!! nl2br(e($convenio->instrucao_bancaria)) !!}</dd>
            </dl>
        </div>
        <div class="card-footer">
            <a href="{{ route('convenios.edit', $convenio->id) }}" class="btn btn-primary">Editar</a>
            <a href="{{ route('convenios.index') }}" class="btn btn-default">Voltar</a>
        </div>
    </div>
@endsection