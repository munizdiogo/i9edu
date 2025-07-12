@extends('adminlte::page')
@section('title', 'Estruturas')

@section('content_header')
    <div class="my-4">
        <h1 class="callout callout-info bg-transparent border-none shadow-none p-4 d-inline">Estruturas</h1>

        @can('estruturas.create')
            <a href="{{ route('estruturas.create') }}" class="btn btn-success float-right">
                <i class="fa fa-plus"></i> Nova Estrutura
            </a>
        @endcan
    </div>
@endsection



@section('content')
    <div class="container-fluid">

        <div class="card">
            <div class="card-body p-0">
                <table class="table table-hover table-striped mb-0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Descrição</th>
                            <th>Nome Fantasia</th>
                            <th>CNPJ</th>
                            <th>Modelo</th>
                            <th>Status</th>
                            <th class="text-center">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($estruturas as $estrutura)
                            <tr>
                                <td>{{ $estrutura->id }}</td>
                                <td>{{ $estrutura->descricao }}</td>
                                <td>{{ $estrutura->nome_fantasia }}</td>
                                <td>{{ $estrutura->cnpj }}</td>
                                <td>{{ $estrutura->modelo_negocio }}</td>
                                <td>
                                    <span
                                        class="badge {{ $estrutura->status == 'Ativo' ? 'badge-success' : 'badge-secondary' }}">
                                        {{ $estrutura->status }}
                                    </span>
                                </td>
                                <td class="text-center">
                                    @include('estruturas.partials.actions')
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">Nenhuma estrutura cadastrada.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                {{ $estruturas->links() }}
            </div>
        </div>
    </div>
@endsection

@section('js')
    @include('components.alert-swal-retorno-operacao')
    @include('components.alert-swal-excluir')
@endsection