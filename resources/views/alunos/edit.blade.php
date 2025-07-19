@extends('adminlte::page')
@section('title', 'Editar Aluno')
@section('content_header')
    <h1 class="callout callout-info bg-transparent border-none shadow-none">Editar Aluno #{{ $aluno->id }}</h1>
@endsection

@section('content')
    <form action="{{ route('alunos.update', $aluno) }}" method="post">
        @csrf @method('PUT')
        @include('alunos.partials.form')
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