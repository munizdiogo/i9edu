@extends('adminlte::page')
@section('title', 'Editar Turma')
@section('content_header')<h1>Editar Turma #{{ $turma->id }}</h1>@endsection



@section('content').
    <form action="{{ route('turmas.update', $turma) }}" method="post">
        @csrf @method('PUT')
        @include('turmas.form')
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