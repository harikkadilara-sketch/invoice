@extends('layouts.app')
@section('title', 'Master Invoice Template')
@push('styles')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('assets/modules/datatables/datatables.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css') }}">
@endpush
@section('content')
    <div class="section-header">
        <h1>Invoices</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Invoices</a></div>
            <div class="breadcrumb-item">List Invoice</div>
        </div>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <a href="{{ route('invoices.create') }}" class="btn btn-primary mb-3">
                            Add
                        </a>

                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" id="table-1">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Res No</th>
                                        <th>Guest</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($invoices as $inv)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $inv->res_no }}</td>
                                            <td>{{ $inv->guest_name }}</td>
                                            <td>
                                                <button type="button" class="btn btn-sm btn-danger btn-delete"
                                                    data-id="{{ $inv->id }}">
                                                    Delete
                                                </button>
                                                <a href="{{ route('invoices.print', $inv->id) }}" target="_blank"
                                                    class="btn btn-sm btn-primary">Preview PDF</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    @include('masterinvoice.modal')

@endsection
@push('scripts')
    <!-- JS Libraies -->
    <script src="{{ asset('assets/modules/datatables/datatables.min.js') }}"></script>
    <script src="{{ asset('assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/modules/datatables/Select-1.2.4/js/dataTables.select.min.js') }}"></script>
    <script src="{{ asset('assets/modules/jquery-ui/jquery-ui.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('assets/js/page/modules-datatables.js') }}"></script>
    <script>
        $('.btn-delete').on('click', function() {
            let id = $(this).data('id');

            if (!confirm('Yakin ingin menghapus invoice ini?')) return;

            $.ajax({
                url: '/invoices/' + id,
                method: 'POST',
                data: {
                    _method: 'DELETE',
                    _token: '{{ csrf_token() }}'
                },
                success: function(res) {
                    toast(res.type, res.title, res.message);

                    if (res.success) {
                        setTimeout(() => {
                            location.reload();
                        }, 500);
                    }
                },
                error: function(xhr) {
                    toast('error', 'Gagal', 'Gagal menghapus invoice');
                    console.log(xhr.responseText);
                }
            });
        });
    </script>
@endpush
