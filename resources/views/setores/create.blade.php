@extends('adminlte::page')
@section('title', 'Novo Setor')
@section('content')
    <form action="{{ route('setores.store') }}" method="POST">@csrf
        @include('setores.form')
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