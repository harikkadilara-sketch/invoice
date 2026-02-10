@extends('layouts.app')
@section('title', 'Invoice Templates')
@push('styles')
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endpush
@section('content')

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Master Template Invoice</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Code</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($templates as $tpl)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $tpl->name }}</td>
                            <td>{{ $tpl->code }}</td>
                            <td>
                                <button class="btn btn-warning btnEdit" data-id="{{ $tpl->id }}">
                                    Edit
                                </button>

                                <button class="btn btn-danger btnDelete" data-id="{{ $tpl->id }}">
                                    Delete
                                </button>

                                <a href="{{ route('invoice-template-fields.index', $tpl) }}" class="btn btn-info">
                                    Fields
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Code</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
            </table>
        </div>
        <!-- /.card-body -->
    </div>


    @include('invoice_templates.modal')
    @include('invoice_templates.modaldelete')

@endsection
@push('scripts')
    <script src="{{ asset('adminlte/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script>
        $(function() {
            $('#example1').DataTable({
                paging: true,
                lengthChange: false,
                searching: true,
                ordering: true,
                info: true,
                autoWidth: false,
                responsive: true,

                dom: '<"row mb-2"<"col-md-6"B><"col-md-6"f>>rtip',

                buttons: [{
                    text: '<i class="fas fa-plus"></i> Add Template',
                    className: 'btn btn-primary',
                    action: function() {
                        $('#modalTemplate').modal('show');
                    }
                }]
            });
        });

        /**
         * ADD
         */
        $('#btnAddTemplate').click(function() {
            $('#templateForm')[0].reset();
            $('#template_id').val('');
            $('#modal-primary').modal('show');
        });

        /**
         * EDIT
         */
        $('.btnEdit').click(function() {
            let id = $(this).data('id');

            $.get('/invoice-templates/' + id, function(res) {
                $('#template_id').val(res.id);
                $('#name').val(res.name);
                $('#code').val(res.code);
                $('#modal-primary').modal('show');
            });
        });

        /**
         * SAVE (INSERT / UPDATE)
         */
        $('#btnSaveTemplate').click(function() {
            let id = $('#template_id').val();
            let url = id ? '/invoice-templates/' + id : '/invoice-templates';
            let method = id ? 'PUT' : 'POST';

            $.ajax({
                url: url,
                type: method,
                data: {
                    _token: '{{ csrf_token() }}',
                    name: $('#name').val(),
                    code: $('#code').val()
                },
                success: function(res) {
                    toastr.success(res.message);
                    location.reload();
                },
                error: function(xhr) {
                    toastr.error(xhr.responseJSON?.message ?? 'Error');
                }
            });
        });

        /**
         * DELETE
         */
        // $('.btnDelete').click(function() {
        //     if (!confirm('Hapus template ini?')) return;

        //     let id = $(this).data('id');

        //     $.ajax({
        //         url: '/invoice-templates/' + id,
        //         type: 'DELETE',
        //         data: {
        //             _token: '{{ csrf_token() }}'
        //         },
        //         success: function(res) {
        //             toastr.success(res.message);
        //             location.reload();
        //         }
        //     });
        // });
        let deleteId = null;

        $(document).on('click', '.btnDelete', function() {
            deleteId = $(this).data('id');
            $('#deleteModal').modal('show');
        });

        $('#btnConfirmDelete').click(function() {
            if (!deleteId) return;

            $.ajax({
                url: '/invoice-templates/' + deleteId,
                type: 'DELETE',
                data: {
                    _token: '{{ csrf_token() }}'
                },
                success: function(res) {
                    $('#deleteModal').modal('hide');
                    toastr.success(res.message);
                    location.reload();
                },
                error: function() {
                    toastr.error('Gagal menghapus data');
                }
            });
        });
    </script>
@endpush
