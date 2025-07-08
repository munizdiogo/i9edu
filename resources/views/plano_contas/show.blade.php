@extends('adminlte::page')
@section('title', 'Visualizar Plano de Contas')

@section('content')
    <div class="container">
        <h1 class="mb-3">Plano de Contas #{{ $planoConta->id }}</h1>

        <a href="{{ route('plano-contas.index') }}" class="btn btn-default mb-3">
            <i class="fas fa-arrow-left"></i> Voltar
        </a>

        <table class="table table-bordered">
            <tbody>
                <tr>
                    <th>ID</th>
                    <td>{{ $planoConta->id }}</td>
                </tr>
                <tr>
                    <th>Descrição</th>
                    <td>{{ $planoConta->descricao }}</td>
                </tr>
                <tr>
                    <th>Código</th>
                    <td>{{ $planoConta->codigo }}</td>
                </tr>
                <tr>
                    <th>Grupo de Contas</th>
                    <td>{{ $planoConta->grupoConta->descricao ?? '-' }}</td>
                </tr>
                <tr>
                    <th>Operação</th>
                    <td>{{ $planoConta->operacao }}</td>
                </tr>
                <tr>
                    <th>Status</th>
                    <td>{{ $planoConta->status }}</td>
                </tr>
                <tr>
                    <th>Tipo Conta</th>
                    <td>{{ $planoConta->tipo_conta }}</td>
                </tr>
                <tr>
                    <th>Natureza</th>
                    <td>{{ $planoConta->natureza }}</td>
                </tr>
                <tr>
                    <th>Criado em</th>
                    <td>{{ $planoConta->created_at->format('d/m/Y H:i') }}</td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection