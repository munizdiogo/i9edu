@extends('adminlte::page')
@section('title', 'Nova Matrícula')
@section('content_header')<h1>Nova Matrícula</h1>@endsection
@section('content')
  <form action="{{ route('matriculas.store') }}" method="post">
    @csrf
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