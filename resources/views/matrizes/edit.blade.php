@extends('adminlte::page')
@section('title', 'Editar Matriz Curricular')

@section('content_header')
    <h1 class="callout callout-info bg-transparent border-none shadow-none">
        Editar Matriz #{{ $matriz->id }}
    </h1>
@endsection

@section('content')
    <form action="{{ route('matrizes.update', $matriz) }}" method="post">
        @csrf @method('PUT')
        @include('matrizes.partials.form')
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