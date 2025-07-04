@extends('adminlte::page')

@section('title', 'Visualizar Requerimento')

@section('content_header')
    <h1 class="m-0 text-dark">Visualizar Requerimento #{{ $requerimento->id }}</h1>
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <a href="{{ route('requerimentos_solicitacoes.index') }}" class="btn btn-default mb-3">
                <i class="fas fa-arrow-left"></i> Voltar
            </a>

            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <th>ID</th>
                        <td>{{ $requerimento->id }}</td>
                    </tr>
                    <tr>
                        <th>Aluno</th>
                        <td>{{ $requerimento->aluno->nome ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th>Matrícula</th>
                        <td>{{ $requerimento->matricula->codigo ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th>Polo</th>
                        <td>{{ $requerimento->polo->nome ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th>Assunto</th>
                        <td>{{ $requerimento->assunto->descricao ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th>Status</th>
                        <td>
                            <span class="badge"
                                style="background-color: {{ $requerimento->status->cor_status ?? '#6c757d' }}">
                                {{ $requerimento->status->descricao ?? '-' }}
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <th>Observações</th>
                        <td>{{ $requerimento->observacoes ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th>Data de Criação</th>
                        <td>{{ date('d/m/Y H:i', $requerimento->created_at) }}</td>
                    </tr>
                </tbody>
            </table>

            @if ($requerimento->disciplinas && $requerimento->disciplinas->count())
                <hr>
                <h5>Disciplinas Selecionadas</h5>
                <ul>
                    @foreach ($requerimento->disciplinas as $disciplina)
                        <li>{{ $disciplina->nome }}</li>
                    @endforeach
                </ul>
            @endif

            @if ($requerimento->anexos && $requerimento->anexos->count())
                <hr>
                <h5>Anexos</h5>
                <ul>
                    @foreach ($requerimento->anexos as $anexo)
                        <li>
                            <a href="{{ asset('storage/' . $anexo->caminho) }}" target="_blank">{{ $anexo->nome_original }}</a>
                        </li>
                    @endforeach
                </ul>
            @endif
        </div>
    </div>
@endsection