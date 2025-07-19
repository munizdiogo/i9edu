@extends('adminlte::page')
@section('title', 'Nova Matriz Curricular')

@section('content_header')
    <h1 class="callout callout-info bg-transparent border-none shadow-none">Nova Matriz Curricular</h1>
@endsection

@section('content')<form action="{{ route('matrizes.store') }}" method="post">@csrf
    @include('matrizes.partials.form')</form>
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