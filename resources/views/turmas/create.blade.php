@extends('adminlte::page')
@section('title', 'Nova Turma')
@section('content_header')
    <h1 class="callout callout-info bg-transparent border-none shadow-none">Nova Turma</h1>
@endsection

@section('content')
    <form action="{{ route('turmas.store') }}" method="post">
        @csrf @include('turmas.partials.form')
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