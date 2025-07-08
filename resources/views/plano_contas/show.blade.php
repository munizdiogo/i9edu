@extends('adminlte::page')
@section('title', 'Visualizar Plano de Contas')

@section('content')
    <div class="container">
        <h1 class="mb-3">Plano de Contas #{{ $plano_conta->id }}</h1>

        <a href="{{ route('plano-contas.index') }}" class="btn btn-default mb-3">
            <i class="fas fa-arrow-left"></i> Voltar
        </a>

        <table class="table table-bordered">
            <tbody>
                <tr>
                    <th>ID</th>
                    <td>{{ $plano_conta->id }}</td>
                </tr>
                <tr>
                    <th>Descrição</th>
                    <td>{{ $plano_conta->descricao }}</td>
                </tr>
                <tr>
                    <th>Código</th>
                    <td>{{ $plano_conta->codigo }}</td>
                </tr>
                <tr>
                    <th>Grupo de Contas</th>
                    <td>{{ $plano_conta->grupoConta->descricao ?? '-' }}</td>
                </tr>
                <tr>
                    <th>Operação</th>
                    <td>{{ $plano_conta->operacao }}</td>
                </tr>
                <tr>
                    <th>Status</th>
                    <td>{{ $plano_conta->status }}</td>
                </tr>
                <tr>
                    <th>Tipo Conta</th>
                    <td>{{ $plano_conta->tipo_conta }}</td>
                </tr>
                <tr>
                    <th>Natureza</th>
                    <td>{{ $plano_conta->natureza }}</td>
                </tr>
                <tr>
                    <th>Criado em</th>
                    <td>{{ $plano_conta->created_at->format('d/m/Y H:i') }}</td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection