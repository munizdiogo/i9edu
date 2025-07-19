@extends('adminlte::page')
@section('title', 'Cupons')

@section('content_header')
    <div class="my-4">
        <h1 class="callout callout-info bg-transparent border-none shadow-none p-4 d-inline">Cupons</h1>

        @can('cupons.create')
            <a href="{{ route('cupons.create') }}" class="btn btn-success float-right">
                <i class="fa fa-plus"></i> Novo Cupom
            </a>
        @endcan
    </div>
@endsection

@section('css')
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.4/css/dataTables.bootstrap4.min.css">
@endsection

@section('content')
    <div class="card p-4">
        <div class="card-body p-0">
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