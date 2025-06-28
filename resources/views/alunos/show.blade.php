@extends('adminlte::page')
@section('title', 'Detalhes do Aluno')
@section('css')
    <style>
        .btn-form {
            display: none;
        }
    </style>
@endsection
@section('content_header')
    <h1 class="d-inline">Detalhes do Aluno #{{ $aluno->id }}</h1>
    <div class="float-right mr-5">
        <a href="{{ route('alunos.edit', $aluno) }}" class="btn my-0 btn-warning"><i class="fas fa-edit"></i></a>
        <form action="{{ route('alunos.destroy', $aluno) }}" method="post" class="d-inline"
            onsubmit="return confirm('Confirma exclusão?')">
            @csrf @method('DELETE')
            <button class="btn my-0 btn-danger"><i class="fas fa-trash-alt"></i></button>
        </form>
    </div>
@endsection
@section('content')
    <div class="card">
        <div class="card-body">
            <fieldset disabled>
                @include('alunos.form')
            </fieldset>
            <div class="card shadow-none p-2">
                <ul class="nav nav-tabs mt-3">
                    <li class="nav-item">
                        <a class="nav-link active" href="#tab-admissoes" data-toggle="tab">Admissões</a>
                    </li>
                    <li class="nav-item"><a class="nav-link " href="#tab-financeiro" data-toggle="tab">Financeiro</a>
                    </li>
                </ul>
                <div class="tab-content p-3">
                    <div id="tab-admissoes" class="tab-pane">
                        <table id="tbl-admissoes" class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Aluno (RA)</th>
                                    <th>Matriz</th>
                                    <th>Ingresso</th>
                                    <th>Turno</th>
                                    <th>Status</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($admissoes as $admissao)
                                    <tr>
                                        <th>{{$admissao->id ?? ''}}</th>
                                        <th>{{$admissao->ra ?? ''}} (RA)</th>
                                        <th>{{$admissao->matriz_curricular_id ?? ''}}</th>
                                        <th>{{$admissao->forma_ingresso_id ?? ''}}</th>
                                        <th>{{$admissao->turno ?? ''}}</th>
                                        <th>{{$admissao->status ?? ''}}</th>
                                        <th>
                                            @if($admissao->id)
                                                <a href="{{ route('admissoes.show', $admissao->id)}}"
                                                    class="btn my-0 btn-primary"><i class="fas fa-eye"></i></a>
                                            @endif
                                        </th>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div id="tab-financeiro" class="tab-pane"></div>
                </div>
            </div>
        </div>


        <div class=" card-footer text-right">
            <a href="{{ route('alunos.index') }}" class="btn btn-default">Voltar</a>
        </div>
    </div>
@endsection