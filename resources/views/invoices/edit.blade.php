@extends('layouts.app')
@section('title', 'Edit Invoice')

@section('content')
    <div class="card">
        <div class="card-body">

            <form id="editForm">
                @csrf
                @method('PUT')

                <input name="guest_name" value="{{ $invoice->guest_name }}" class="form-control mb-2">
                <input name="hotel_name" value="{{ $invoice->hotel_name }}" class="form-control mb-2">

                <textarea id="content" name="content">{!! $invoice->content !!}</textarea>

                <button class="btn btn-primary mt-3">Update</button>
            </form>

        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('assets/tinymce/tinymce.min.js') }}"></script>
    <script>
        tinymce.init({
            selector: '#content',
            height: 500,
            license_key: 'gpl'
        });

        $('#editForm').on('submit', function(e) {
            e.preventDefault();
            tinymce.triggerSave();

            $.ajax({
                url: "{{ route('invoices.update', $invoice->id) }}",
                method: "POST",
                data: $(this).serialize(),
                success: function(res) {
                    toast(res.type, res.title, res.message);
                    if (res.success) {
                        window.location.href = "{{ route('invoices.index') }}";
                    }
                }
            });
        });
    </script>
@endpush
