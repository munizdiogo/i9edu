<script src="//code.jquery.com/jquery-3.7.0.min.js"></script>
<script src="//cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="//cdn.datatables.net/1.13.4/js/dataTables.bootstrap4.min.js"></script>
<script>
    $(function () {
        $('#datatable').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{ route("plano-contas.data") }}',
            columns: [
                { data: 'id', name: 'id' },
                { data: 'descricao', name: 'descricao' },
                { data: 'codigo', name: 'codigo' },
                { data: 'status', name: 'status' },
                { data: 'grupo', name: 'grupo' },
                { data: 'actions', name: 'actions', orderable: false, searchable: false },
            ],
            responsive: true,
            autoWidth: false,
            language: { url: 'https://cdn.datatables.net/plug-ins/1.13.4/i18n/pt-BR.json' },
            pageLength: 10,
            lengthMenu: [[10, 25, 50, -1], ['10', '25', '50', 'Todos']],
            dom: 'lBfrtip',
            buttons: ['copy', 'csv', 'excel', 'pdf', 'print', 'colvis'],
        });
    });
</script>