@extends('adminlte::page')
@section('title', 'Nova Área de Conhecimento')

@section('content_header')
    <h1 class="callout callout-info bg-transparent border-none shadow-none">
        Nova Área do Conhecimento
    </h1>
@endsection

@section('content')
    <form action="{{ route('area_conhecimentos.store') }}" method="POST">@csrf
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