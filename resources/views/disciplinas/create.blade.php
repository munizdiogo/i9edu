@extends('adminlte::page')
@section('title', 'Nova Disciplina')
@section('content_header')<h1>Nova Disciplina</h1>@endsection
@section('content')
    <form action="{{ route('disciplinas.store') }}" method="POST">@csrf
        @include('disciplinas.form')
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