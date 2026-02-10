{{-- resources/views/masterinvoice/edit.blade.php --}}
@extends('layouts.app')

@section('content')
    <div class="section-header">
        <h1>Form Edit</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Master Template</a></div>
            <div class="breadcrumb-item"><a href="#">Forms</a></div>
            <div class="breadcrumb-item">Form Edit</div>
        </div>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                    <form id="formInvoice" action="{{ route('masterinvoice.update', $invoice->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Name Template</label>
                                        <input type="text" name="name" class="form-control" required
                                            value="{{ $invoice->name }}">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Kode Template</label>
                                        <input type="text" name="code" class="form-control" readonly required
                                            value="{{ $invoice->code }}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Status</label>
                                        <select class="form-control" name="is_active" required>
                                            <option value="1" {{ $invoice->is_active == 1 ? 'selected' : '' }}>Active
                                            </option>
                                            <option value="0" {{ $invoice->is_active == 0 ? 'selected' : '' }}>Inactive
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Description</label>
                                        <textarea name="description" id="description" class="form-control">{{ $invoice->description }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Konten</label>
                                <textarea name="content" id="content">
                                {!! $invoice->content !!}
                            </textarea>
                            </div>
                            <div class="card-footer text-right">
                                <button class="btn btn-primary">Update</button>
                            </div>
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
            height: 500,
            license_key: 'gpl',
            plugins: 'code table lists',
            toolbar: 'undo redo | bold italic | table | code'
        });

        $('#formInvoice').on('submit', function(e) {
            e.preventDefault();

            // WAJIB agar textarea ke-update
            tinymce.triggerSave();

            $.ajax({
                url: "{{ route('masterinvoice.update', $invoice->id) }}",
                type: "POST",
                data: $(this).serialize(),
                success: function(res) {
                    toast(res.type, res.title, res.message);

                    if (res.success) {
                        window.location.href = "{{ route('masterinvoice.index') }}";
                    }
                },
                error: function(xhr) {
                    toast('error', 'Gagal', 'Update gagal');
                    console.log(xhr.responseText);
                }
            });
        });
    </script>
@endpush
