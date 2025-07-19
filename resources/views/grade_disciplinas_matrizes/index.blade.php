@extends('adminlte::page')
@section('title', 'Grade Disciplinas Matrizes')

@section('content_header')
    <div class="my-4">
        <h1 class="callout callout-info bg-transparent border-none shadow-none p-4 d-inline">Grade Disciplinas Matrizes</h1>

        @can('grade_disciplinas_matrizes.create')
            <a href="{{ route('grade_disciplinas_matrizes.create') }}" class="btn btn-success float-right">
                <i class="fa fa-plus"></i> Novo Vínculo</a>
        @endcan
    </div>
@endsection


@section('css')
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.4/css/dataTables.bootstrap4.min.css">
@endsection
@section('content')
    <div class="card p-4">
        <div class="card-body p-0">
            <table id="tbl-grade" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Matriz</th>
                        <th>Disciplina</th>
                        <th>Ações</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
@endsection

@section('js')
    @include('components.alert-swal-retorno-operacao')
    @include('components.alert-swal-excluir')

    <script src="//code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="//cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="//cdn.datatables.net/1.13.4/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(function () {
            $('#tbl-grade').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route("grade_disciplinas_matrizes.data") }}',
                columns: [
                    { data: 'id' },
                    { data: 'matriz' },
                    { data: 'disciplina' },
                    { data: 'actions', orderable: false, searchable: false }
                ],
                language: { url: 'https://cdn.datatables.net/plug-ins/1.13.4/i18n/pt-BR.json' }
            });
        });
    </script>
@endsection