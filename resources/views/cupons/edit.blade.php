@extends('adminlte::page')
@section('title', 'Novo Cupom')
@section('content')
    @section('content_header')<h1>Editar Cupom #{{ $cupom->id }}</h1>@endsection

    <ul class="nav nav-tabs" id="cupomTabs" role="tablist">
        <li class="nav-item" role="presentation">
            <a class="nav-link active" id="dados-tab" data-toggle="tab" href="#dados" role="tab">Dados do Cupom</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link" id="cursos-tab" data-toggle="tab" href="#cursos" role="tab">Cursos</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link" id="polos-tab" data-toggle="tab" href="#polos" role="tab">Polos</a>
        </li>
    </ul>
    <div class="tab-content" id="cupomTabsContent">
        <div class="tab-pane fade show active" id="dados" role="tabpanel">
            <form action="{{ route('cupons.update', $cupom)}}" method="POST">
                @csrf
                @method('PUT')
                @include('cupons.form')
                <button class="btn btn-primary">Salvar</button>
                <a href="{{ route('cupons.index') }}" class="btn btn-default">Voltar</a>
            </form>
        </div>
        <div class="tab-pane fade card p-5" id="cursos" role="tabpanel">
            @include('cupons.partials.cursos')
        </div>
        <div class="tab-pane fade card p-5" id="polos" role="tabpanel">
            @include('cupons.partials.polos')
        </div>
    </div>

@endsection