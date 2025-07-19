@extends('adminlte::page')
@section('title', 'Editar Vínculo Disciplina x Matriz Curricular')

@section('content_header')
    <h1 class="callout callout-info bg-transparent border-none shadow-none">
        Editar Disciplina x Matriz Curricular #{{ $grade_disciplinas_matrize->id }}
    </h1>
@endsection


@section('content')
    <form action="{{ route('grade_disciplinas_matrizes.update', $grade_disciplinas_matrize) }}" method="POST">
        @csrf @method('PUT')
        @include('grade_disciplinas_matrizes.partials.form')
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