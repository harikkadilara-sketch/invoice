{{-- resources/views/masterinvoice/create.blade.php --}}
@extends('layouts.app')

@section('content')
    <div class="section-header">
        <h1>Form Master Template</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item"><a href="#">Forms</a></div>
            <div class="breadcrumb-item">Form Master Template</div>
        </div>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                    <form id="formInvoice">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Name Template</label>
                                        <input type="text" name="name" class="form-control" required>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Kode Template</label>
                                        <input type="text" name="code" class="form-control" readonly required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Status</label>
                                        <select class="form-control" name="is_active" required>
                                            <option value="1">Active</option>
                                            <option value="0">Inactive</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Description</label>
                                        <textarea name="description" id="description" class="form-control"></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Konten</label>
                                <textarea name="content" id="content"></textarea>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <button class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('assets/tinymce/tinymce.min.js') }}"></script>

    <script>
        tinymce.init({
            selector: '#content',
            height: 400,
            license_key: 'gpl',
            plugins: 'lists table code',
            toolbar: 'undo redo | bold italic | alignleft aligncenter alignright | bullist numlist | table | code',
            branding: false
        });
    </script>

    <script>
        $('#formInvoice').on('submit', function(e) {
            e.preventDefault();

            $.ajax({
                url: "{{ route('masterinvoice.store') }}",
                type: "POST",
                data: $(this).serialize(),
                success: function(res) {
                    toast(res.type, res.title, res.message);

                    if (res.success) {
                        window.location.href = "{{ route('masterinvoice.index') }}";
                    }
                },
                error: function(xhr) {
                    toast('error', 'Error', 'Gagal menyimpan data');
                }
            });
        });
    </script>
@endpush
