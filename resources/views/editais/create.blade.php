@extends('adminlte::page')

@section('title', 'Novo Edital')

@section('content_header')
    <h1 class="callout callout-info bg-transparent border-none shadow-none">Novo Edital</h1>
@endsection

@section('content')
    <form action="{{ route('editais.store') }}" method="post">
        @csrf
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