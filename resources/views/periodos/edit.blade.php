@extends('adminlte::page')
@section('title', 'Editar Período Letivo')
@section('content_header')<h1>Editar Período #{{ $periodo->id }}</h1>@endsection
@section('content')
    <form action="{{ route('periodos.update', $periodo) }}" method="post">
        @csrf @method('PUT')
        @include('periodos.form')
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