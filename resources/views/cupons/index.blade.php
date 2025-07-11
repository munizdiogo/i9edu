@extends('adminlte::page')
@section('title', 'Cupons')


@can('cupons.create')
    @section('content_header')
        <h1 class="d-inline">Cupons</h1>
        <a href="{{ route('cupons.create') }}" class="btn btn-success float-right">Novo Cupom</a>
    @endsection
@endcan

@section('css')
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.4/css/dataTables.bootstrap4.min.css">
@endsection
@section('content')
    <table id="cupons-table" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Código</th>
                <th>Vigência</th>
                <th>Qtde Máxima</th>
                <th>Convênio</th>
                <th>Status</th>
                <th>Ações</th>
            </tr>
        </thead>
    </table>
@endsection
@section('js')
    <script src="//code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="//cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="//cdn.datatables.net/1.13.4/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(function () {
            $('#cupons-table').DataTable({
                processing: true,
                serverSide: false,
                ajax: "{{ route('cupons.data') }}",
                columns: [
                    { data: 'codigo' },
                    { data: 'vigencia' },
                    { data: 'quantidade_maxima' },
                    { data: 'convenio' },
                    { data: 'status' },
                    { data: 'actions', orderable: false, searchable: false }
                ]
            });
        });
    </script>
@endsection