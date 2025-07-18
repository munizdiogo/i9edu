@extends('adminlte::page')
@section('title', 'Editar Área de Conhecimento')
@section('content')
    <form action="{{ route('area_conhecimentos.update', $area_conhecimento) }}" method="POST">
        @csrf @method('PUT')
        @include('area_conhecimentos.partials.form')
        <button type="submit" class="btn btn-primary">Salvar</button>
        <a href="{{ route('area_conhecimentos.index') }}" class="btn btn-secondary">Voltar</a>
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