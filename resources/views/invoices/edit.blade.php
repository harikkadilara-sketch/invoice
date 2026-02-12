@extends('layouts.app')
@section('title', 'Edit Invoice')

@section('content')
    <div class="section-header">
        <h1>Edit Invoice</h1>
    </div>

    <div class="card">
        <div class="card-body">

            <form id="invoiceForm" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                {{-- TEMPLATE --}}
                <div class="mb-3">
                    <label>Template</label>
                    <select name="master_invoice_id" class="form-control" required>
                        <option value="">-- Pilih Template --</option>
                        @foreach ($templates as $t)
                            <option value="{{ $t->id }}"
                                {{ old('master_invoice_id', $invoice->master_invoice_id) == $t->id ? 'selected' : '' }}>
                                {{ $t->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="row">

                    {{-- BASIC --}}
                    <div class="col-md-4 mb-2">
                        <label>Sumber</label>
                        <input name="sumber" class="form-control" value="{{ old('sumber', $invoice->sumber) }}">
                    </div>

                    <div class="col-md-4 mb-2">
                        <label>Profit</label>
                        <input type="text" id="profit" name="profit" class="form-control"
                            value="{{ old('profit', $invoice->profit ? 'SAR ' . number_format($invoice->profit, 2, '.', ',') : '') }}">

                    </div>

                    <div class="col-md-4 mb-2">
                        <label>Date</label>
                        <input type="date" name="date" class="form-control"
                            value="{{ old('date', $invoice->date ? \Carbon\Carbon::parse($invoice->date)->format('Y-m-d') : '') }}">
                    </div>

                    <div class="col-md-4 mb-2">
                        <label>To</label>
                        <input name="to" class="form-control" value="{{ old('to', $invoice->to) }}">
                    </div>

                    <div class="col-md-4 mb-2">
                        <label>From</label>
                        <input name="from" class="form-control" value="{{ old('from', $invoice->from) }}">
                    </div>

                    <div class="col-md-4 mb-2">
                        <label>Invoice Info</label>
                        <input name="info_invoice" class="form-control"
                            value="{{ old('info_invoice', $invoice->info_invoice) }}">
                    </div>

                    <div class="col-md-4 mb-2">
                        <label>Guest Name</label>
                        <input name="guest_name" class="form-control" value="{{ old('guest_name', $invoice->guest_name) }}">
                    </div>

                    <div class="col-md-4 mb-2">
                        <label>Hotel Name</label>
                        <input name="hotel_name" class="form-control"
                            value="{{ old('hotel_name', $invoice->hotel_name) }}">
                    </div>

                    <div class="col-md-4 mb-2">
                        <label>Arrival Date</label>
                        <input type="date" name="arrival_date" class="form-control"
                            value="{{ old('arrival_date', $invoice->arrival_date ? \Carbon\Carbon::parse($invoice->arrival_date)->format('Y-m-d') : '') }}">
                    </div>

                    <div class="col-md-4 mb-2">
                        <label>Departure Date</label>
                        <input type="date" name="departure_date" class="form-control"
                            value="{{ old('departure_date', $invoice->departure_date ? \Carbon\Carbon::parse($invoice->departure_date)->format('Y-m-d') : '') }}">
                    </div>

                    <div class="col-md-4 mb-2">
                        <label>Total</label>
                        <input type="text" name="total" class="form-control"
                            value="{{ old('total', $invoice->total) }}">
                    </div>

                    {{-- LOGO --}}
                    <div class="col-md-4 mb-2">
                        <label>Company Logo</label>

                        @if ($invoice->company_logo)
                            <div class="mb-2">
                                <img src="{{ asset('storage/' . $invoice->company_logo) }}" width="120">
                            </div>
                        @endif

                        <input type="file" name="company_logo" class="form-control"
                            accept="image/png,image/jpeg,image/jpg">
                    </div>

                    {{-- BANK --}}
                    <div class="col-md-4 mb-2">
                        <label>Bank Account Name</label>
                        <input type="text" name="bank_account_name" class="form-control"
                            value="{{ old('bank_account_name', $invoice->bank_account_name) }}">
                    </div>

                    <div class="col-md-4 mb-2">
                        <label>Bank Name</label>
                        <input type="text" name="bank_name" class="form-control"
                            value="{{ old('bank_name', $invoice->bank_name) }}">
                    </div>

                    <div class="col-md-4 mb-2">
                        <label>Bank Branch</label>
                        <input type="text" name="bank_branch" class="form-control"
                            value="{{ old('bank_branch', $invoice->bank_branch) }}">
                    </div>

                    <div class="col-md-4 mb-2">
                        <label>Bank Account Number</label>
                        <input type="text" name="bank_account_number" class="form-control"
                            value="{{ old('bank_account_number', $invoice->bank_account_number) }}">
                    </div>

                    <div class="col-md-4 mb-2">
                        <label>IBAN</label>
                        <input type="text" name="bank_iban" class="form-control"
                            value="{{ old('bank_iban', $invoice->bank_iban) }}">
                    </div>

                    <div class="col-md-4 mb-2">
                        <label>Swift Code</label>
                        <input type="text" name="bank_swift" class="form-control"
                            value="{{ old('bank_swift', $invoice->bank_swift) }}">
                    </div>

                    <div class="col-md-8 mb-2">
                        <label>Remarks</label>
                        <textarea name="remarks" rows="4" class="form-control">{{ old('remarks', $invoice->remarks) }}</textarea>
                    </div>

                    <div class="col-md-4 mb-2">
                        <label>URL WEB</label>
                        <input type="text" name="url_web" class="form-control"
                            value="{{ old('url_web', $invoice->url_web) }}">
                    </div>

                </div>

                <hr>

                <textarea id="content" name="content">
                @if ($invoice->company_logo)
<p>
                        <img src="{{ $logoUrl }}" style="max-width:200px;">
                    </p>
@endif

                {!! old('content', $invoice->content) !!}
                </textarea>


                <div class="text-end mt-3">
                    <button class="btn btn-primary">Update</button>
                </div>

            </form>

        </div>
    </div>
@endsection
@push('scripts')
    <script src="{{ asset('assets/tinymce/tinymce.min.js') }}"></script>

    <script>
        tinymce.init({
            selector: '#content',
            height: 1050,
            license_key: 'gpl',
            plugins: 'code table image',
            toolbar: 'undo redo | bold italic | table | image | code',
            setup: function(editor) {
                editor.on('init', function() {

                    let logo =
                        "{{ $invoice->company_logo ? asset('storage/logos/' . $invoice->company_logo) : '' }}";

                    if (logo) {
                        let currentContent = editor.getContent();

                        // cek supaya tidak dobel
                        if (!currentContent.includes(logo)) {
                            editor.setContent(
                                '<p><img src="' + logo + '" style="max-width:200px;"></p>' +
                                currentContent
                            );
                        }
                    }

                });
            }
        });


        $('#invoiceForm').on('submit', function(e) {
            e.preventDefault();
            tinymce.triggerSave();

            let fd = new FormData(this);

            $.ajax({
                url: "{{ route('invoices.update', $invoice->id) }}",
                method: "POST",
                data: fd,
                processData: false,
                contentType: false,
                success: function(res) {
                    toast(res.type, res.title, res.message);

                    if (res.type === 'success') {
                        setTimeout(() => {
                            window.location.href = "{{ route('invoices.index') }}";
                        }, 2000);
                    }
                },
                error: function(xhr) {
                    toast('error', 'Gagal', 'Update gagal');
                    console.log(xhr.responseText);
                }
            });
        });
    </script>
    <script>
        function formatSARInput(value) {
            value = value.replace(/[^0-9.]/g, '');

            let [intPart, decPart] = value.split('.');

            intPart = intPart || '0';
            intPart = intPart.replace(/\B(?=(\d{3})+(?!\d))/g, ',');

            if (decPart !== undefined) {
                decPart = decPart.substring(0, 2);
                return `SAR ${intPart}.${decPart}`;
            }

            return `SAR ${intPart}.00`;
        }

        document.getElementById('profit').addEventListener('input', function() {
            let cursorPos = this.selectionStart;
            this.value = formatSARInput(this.value);
            this.setSelectionRange(cursorPos, cursorPos);
        });
    </script>
@endpush
