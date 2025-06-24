@extends('adminlte::page')
@section('title', 'Editar Matrícula #' . $matricula->id)
@section('content_header')<h1>Editar Matrícula #{{ $matricula->id }}</h1>@endsection
@section('content')
    <form action="{{ route('matriculas.update', $matricula) }}" method="post">
        @csrf @method('PUT')
        @include('matriculas.form')
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