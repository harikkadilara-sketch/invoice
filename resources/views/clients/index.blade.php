@extends('layouts.app')
@section('title', 'Client Management')

@section('content')
    <button class="btn btn-primary mb-3" id="btnAddClient">Tambah Client</button>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($clients as $client)
                <tr>
                    <td>{{ $client->name }}</td>
                    <td>{{ $client->email }}</td>
                    <td>{{ $client->phone }}</td>
                    <td>
                        <button class="btn btn-warning btnEditClient" data-id="{{ $client->id }}">Edit</button>
                        <button class="btn btn-danger btnDeleteClient" data-id="{{ $client->id }}">Hapus</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    @include('clients.modal')
@endsection
@push('scripts')
    <script>
        /**
         * ADD
         */
        $(document).on('click', '#btnAddClient', function() {
            $('#clientForm')[0].reset();
            $('#client_id').val('');
            $('#clientModal').modal('show');
        });

        /**
         * EDIT
         */
        $(document).on('click', '.btnEditClient', function() {
            let id = $(this).data('id');

            $.get('/clients/' + id, function(res) {
                $('#client_id').val(res.id);
                $('#name').val(res.name);
                $('#email').val(res.email);
                $('#phone').val(res.phone);
                $('#address').val(res.address);
                $('#clientModal').modal('show');
            });
        });

        /**
         * SAVE (INSERT / UPDATE)
         */
        $(document).on('click', '#btnSaveClient', function() {
            let id = $('#client_id').val();
            let url = id ? '/clients/' + id : '/clients';

            let data = $('#clientForm').serialize();
            if (id) data += '&_method=PUT';

            $.post(url, data, function(res) {
                toastr.success(res.message);
                location.reload();
            });
        });

        /**
         * DELETE
         */
        $(document).on('click', '.btnDeleteClient', function() {
            if (!confirm('Hapus client ini?')) return;

            let id = $(this).data('id');

            $.post('/clients/' + id, {
                _method: 'DELETE'
            }, function(res) {
                toastr.success(res.message);
                location.reload();
            });
        });
    </script>
@endpush
