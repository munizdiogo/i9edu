@extends('adminlte::page')
@section('title', 'Nova Solicitação')
@section('content')
    <div class="card p-5 m-4">
        <form action="{{ route('requerimentos_solicitacoes.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @include('requerimentos_solicitacoes.partials.form', ['alunos' => $alunos])
            <button type="submit" class="btn btn-primary">Salvar</button>
            <a href="{{ route('requerimentos_solicitacoes.index') }}" class="btn btn-default">Voltar</a>
        </form>
    </div>
@endsection

@section('js')
    @include('components.alert-swal-retorno-operacao')
@endsection