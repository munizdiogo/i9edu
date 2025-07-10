@extends('adminlte::page')
@section('title', 'Estruturas')

@section('content')
    <div class="container-fluid">
        <h1 class="mb-4">Estruturas</h1>

        {{-- Mensagens de sucesso --}}
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        {{-- Botão Nova Estrutura --}}
        <a href="{{ route('estruturas.create') }}" class="btn btn-primary mb-3">
            <i class="fa fa-plus"></i> Nova Estrutura
        </a>

        {{-- Tabela de Estruturas --}}
        <div class="card">
            <div class="card-body p-0">
                <table class="table table-hover table-striped mb-0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Descrição</th>
                            <th>Nome Fantasia</th>
                            <th>CNPJ</th>
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
                                <td>
                                    <span
                                        class="badge {{ $estrutura->status == 'Ativo' ? 'badge-success' : 'badge-secondary' }}">
                                        {{ $estrutura->status }}
                                    </span>
                                </td>
                                <td class="text-center">
                                    <a href="{{ route('estruturas.edit', $estrutura) }}" class="btn btn-sm btn-warning"
                                        title="Editar">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <form action="{{ route('estruturas.destroy', $estrutura) }}" method="POST" class="d-inline"
                                        onsubmit="return confirm('Deseja realmente excluir esta estrutura?');">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger" title="Excluir">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                    {{-- (Opcional) Botão de seleção da estrutura ativa --}}
                                    <form action="{{ route('estruturas.selecionar') }}" method="POST" class="d-inline">
                                        @csrf
                                        <input type="hidden" name="estrutura_id" value="{{ $estrutura->id }}">
                                        <button class="btn btn-sm btn-info" title="Selecionar Estrutura">
                                            <i class="fa fa-check-circle"></i>
                                        </button>
                                    </form>
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