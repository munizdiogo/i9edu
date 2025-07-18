{{-- resources/views/perfis/index.blade.php --}}
@extends('adminlte::page')

@section('title', 'Perfis')

@section('content_header')
    <div class="my-4">
        <h1 class="callout callout-info bg-transparent border-none shadow-none p-4 d-inline">Perfis</h1>

        @can('perfis.create')
            <a href="{{ route('perfis.create') }}" class="btn btn-success float-right">
                <i class="fa fa-plus"></i> Novo Perfil
            </a>
        @endcan
    </div>
@endsection


@section('css')
    {{-- DataTables & Buttons CSS --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.6/css/buttons.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.4.1/css/responsive.bootstrap4.min.css">
@endsection

@section('content')
    <div class="card p-4">
        <div class="card-body p-0">
            <table id="perfis-table" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tipo Cadastro</th>
                        <th>CPF/CNPJ</th>
                        <th>Nome/Razão</th>
                        <th>Email</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- vazio: DataTables vai preencher via AJAX --}}
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('js')
    @include('components.alert-swal-retorno-operacao')
    @include('components.alert-swal-excluir')

    {{-- jQuery, DataTables & Buttons JS --}}
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap4.min.js"></script>

    <script src="https://cdn.datatables.net/responsive/2.4.1/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.4.1/js/responsive.bootstrap4.min.js"></script>

    <script src="https://cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.bootstrap4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.68/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.68/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.colVis.min.js"></script>

    <script>
        $(document).ready(function () {
            $('#perfis-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route("perfis.data") }}',
                columns: [
                    { data: 'id' },
                    { data: 'tipo_cadastro' },
                    { data: 'cpf' },
                    { data: 'name' },
                    { data: 'email' },
                    { data: 'actions', orderable: false, searchable: false },
                ],
                dom: 'lBfrtip',
                buttons: ['copy', 'csv', 'excel', 'pdf', 'print', 'colvis'],
                responsive: true,
                autoWidth: false,
                language: { url: 'https://cdn.datatables.net/plug-ins/1.13.4/i18n/pt-BR.json' },

                // aqui!
                pageLength: 10,         // padrão inicial
                lengthMenu: [           // [valores], [rótulos]
                    [10, 25, 50, -1],
                    ['10 linhas', '25 linhas', '50 linhas', 'Todos']
                ],
            });

        });
    </script>
@endsection