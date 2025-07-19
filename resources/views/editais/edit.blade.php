@extends('adminlte::page')

@section('title', 'Editar Edital #' . $edital->id)

@section('content_header')
    <h1 class="callout callout-info bg-transparent border-none shadow-none">Editar Edital #{{ $edital->id }}</h1>
@endsection

@section('content')
    <form action="{{ route('editais.update', $edital) }}" method="post">
        @csrf
        @method('PUT')
        @include('editais.partials.form')
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