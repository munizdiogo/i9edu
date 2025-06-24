@extends('adminlte::page')
@section('title', 'Nova Disciplina Base')
@section('content_header')
    <h1>Nova Disciplina Base</h1>
@endsection
@section('content')
    <form action="{{ route('disciplinas_base.store') }}" method="post">
        @csrf
        @include('disciplinas_base.form')
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