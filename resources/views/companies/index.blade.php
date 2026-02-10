@extends('layouts.app')
@section('title', 'Company Management')

@section('content')
    <button class="btn btn-primary mb-3" id="btnAddCompany">Tambah Company</button>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama</th>
                <th>VAT</th>
                <th>Reg No</th>
                <th>Currency</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($companies as $company)
                <tr>
                    <td>{{ $company->name }}</td>
                    <td>{{ $company->vat_number }}</td>
                    <td>{{ $company->registration_number }}</td>
                    <td>{{ $company->currency }}</td>
                    <td>
                        <button class="btn btn-warning btnEditCompany" data-id="{{ $company->id }}">Edit</button>
                        <button class="btn btn-danger btnDeleteCompany" data-id="{{ $company->id }}">Hapus</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    @include('companies.modal')
@endsection
@push('scripts')
    <script>
        /**
         * ADD
         */
        $(document).on('click', '#btnAddCompany', function() {
            $('#companyForm')[0].reset();
            $('#company_id').val('');
            $('#companyModal').modal('show');
        });

        /**
         * EDIT
         */
        $(document).on('click', '.btnEditCompany', function() {
            let id = $(this).data('id');

            $.get('/companies/' + id, function(res) {
                $('#company_id').val(res.id);
                $('#name').val(res.name);
                $('#vat_number').val(res.vat_number);
                $('#registration_number').val(res.registration_number);
                $('#currency').val(res.currency);
                $('#address').val(res.address);
                $('#companyModal').modal('show');
            });
        });

        /**
         * SAVE (INSERT / UPDATE)
         */
        $(document).on('click', '#btnSaveCompany', function() {
            let id = $('#company_id').val();
            let url = id ? '/companies/' + id : '/companies';

            let data = $('#companyForm').serialize();
            if (id) data += '&_method=PUT';

            $.post(url, data, function(res) {
                toastr.success(res.message);
                location.reload();
            });
        });

        /**
         * DELETE
         */
        $(document).on('click', '.btnDeleteCompany', function() {
            if (!confirm('Hapus company ini?')) return;

            let id = $(this).data('id');

            $.post('/companies/' + id, {
                _method: 'DELETE'
            }, function(res) {
                toastr.success(res.message);
                location.reload();
            });
        });
    </script>
@endpush
