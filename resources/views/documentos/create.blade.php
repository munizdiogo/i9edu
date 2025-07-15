{{-- resources/views/documentos/create.blade.php --}}
@extends('adminlte::page')
@section('title', 'Novo Documento')

@section('content_header')
    <h1 class="callout callout-info bg-transparent border-none shadow-none">Novo Documento</h1>
@endsection


@section('content')
    <form action="{{ route('documentos.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @include('documentos.partials.form')
    </form>
@endsection

{{-- resources/views/documentos/edit.blade.php --}}
@extends('adminlte::page')
@section('title', 'Editar Documento')
@section('content')
    <form action="{{ route('documentos.create') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        @include('documentos.partials.form')
        <button class="btn btn-primary">Salvar</button>
        <a href="{{ route('documentos.index') }}" class="btn btn-default">Voltar</a>
    </form>
@endsection