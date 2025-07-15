{{-- resources/views/documentos/create.blade.php --}}
@extends('adminlte::page')
@section('title', 'Novo Documento')


@section('content_header')
    <div class="my-4">
        <h1 class="callout callout-info bg-transparent border-none shadow-none p-4 d-inline">Editar documento
            #{{ $documento->id }}
        </h1>
    </div>
@endsection


@section('content')
    <form action="{{ route('documentos.update', $documento) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        @include('documentos.partials.form')
    </form>
@endsection