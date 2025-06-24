@extends('adminlte::page')

@section('title', 'Novo Edital')

@section('content_header')
    <h1>Novo Edital</h1>
@endsection

@section('content')
    <form action="{{ route('editais.store') }}" method="post">
        @csrf
        @include('editais.form')
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