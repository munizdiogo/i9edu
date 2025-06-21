@extends('adminlte::page')
@section('title', 'Novo Vínculo')
@section('content')
    <form action="{{ route('grade_disciplinas_matrizes.store') }}" method="POST">
        @csrf
        @include('grade_disciplinas_matrizes.form')
    </form>
@endsection