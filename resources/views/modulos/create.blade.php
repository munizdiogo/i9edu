@extends('adminlte::page')
@section('title', 'Novo Módulo')
@section('content')
    <form action="{{ route('modulos.store') }}" method="POST">
        @csrf
        @include('modulos.form')
        <button class="btn btn-primary">Salvar</button>
        <a href="{{ route('modulos.index') }}" class="btn btn-default">Voltar</a>
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