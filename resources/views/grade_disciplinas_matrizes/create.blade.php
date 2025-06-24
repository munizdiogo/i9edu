@extends('adminlte::page')
@section('title', 'Novo Vínculo')
@section('content')
    <form action="{{ route('grade_disciplinas_matrizes.store') }}" method="POST">
        @csrf
        @include('grade_disciplinas_matrizes.form')
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