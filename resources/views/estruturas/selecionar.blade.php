@extends('adminlte::page')
@section('title', 'Selecionar Estrutura')
@section('content')
    <h4>Selecione a Estrutura que deseja acessar:</h4>
    <form method="POST" action="{{ route('estrutura.definir') }}">
        @csrf
        <select name="estrutura_id" class="form-control" required>
            @foreach($estruturas as $estrutura)
                <option value="{{ $estrutura->id }}">{{ $estrutura->descricao }}</option>
            @endforeach
        </select>
        <button class="btn btn-primary mt-2">Acessar</button>
    </form>
@endsection