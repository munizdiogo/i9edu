@extends('adminlte::page')
@section('title', 'Novo Contrato')

@section('content_header')
    <h1 class="callout callout-info bg-transparent border-none shadow-none">Novo Contrato</h1>
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('contratos.store') }}" method="POST">
                @csrf
                @include('contratos.partials.form')
            </form>
        </div>
    </div>
@endsection