@extends('adminlte::page')
@section('title', 'Editar Área de Conhecimento')

@section('content_header')
    <h1 class="callout callout-info bg-transparent border-none shadow-none">
        Editar Área do Conhecimento #{{ $area_conhecimento->id }}
    </h1>
@endsection

@section('content')
    <form action="{{ route('area_conhecimentos.update', $area_conhecimento) }}" method="POST">
        @csrf @method('PUT')
        @include('area_conhecimentos.partials.form')
    </form>
@endsection

@push('js')
    <script>
        $(function () {
            $('.select2bs4').select2({
                theme: 'bootstrap4',
                allowClear: true,
                placeholder: function () {
                    return $(this).data('placeholder');
                }
            });
        });
    </script>
@endpush