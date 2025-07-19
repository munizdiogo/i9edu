@extends('adminlte::page')
@section('title', 'Editar Etapa #' . $etapas_periodos_letivo->id)


@section('content_header')
    <h1 class="callout callout-info bg-transparent border-none shadow-none">Editar Etapa #{{ $etapas_periodos_letivo->id }}
    </h1>
@endsection

@section('content')
    <form action="{{ route('etapas_periodos_letivos.update', $etapas_periodos_letivo) }}" method="POST">
        @csrf @method('PUT')
        @include('etapas_periodos_letivos.partials.form')
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