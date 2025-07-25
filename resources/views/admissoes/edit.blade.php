@extends('adminlte::page')

@section('title', 'Editar Curso Ingresso #' . $admissao->id)

@section('content_header')
    <h1 class="callout callout-info bg-transparent border-none shadow-none">
        Editar Curso Ingresso #{{ $admissao->id }}
    </h1>
@endsection

@section('content')
    <form action="{{ route('admissoes.update', $admissao) }}" method="post">
        @csrf
        @method('PUT')
        @include('admissoes.partials.form')
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