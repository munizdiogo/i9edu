@extends('adminlte::page')
@section('title', 'Editar Disciplina #' . $disciplina->id)

@section('content_header')
    <h1 class="callout callout-info bg-transparent border-none shadow-none">Editar Disciplina #{{ $disciplina->id }}</h1>
@endsection

@section('content')
    <form action="{{ route('disciplinas.update', $disciplina) }}" method="POST">@csrf @method('PUT')
        @include('disciplinas.partials.form')
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