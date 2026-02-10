@extends('layouts.app')
@section('title', 'Create Invoice')

@section('content')
    <div class="section-header">
        <h1>Form Invoices</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Invoices</a></div>
            <div class="breadcrumb-item"><a href="#">Forms</a></div>
            <div class="breadcrumb-item">Form Invoices</div>
        </div>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-body">

                        <form id="invoiceForm">
                            @csrf

                            {{-- TEMPLATE --}}
                            <div class="mb-3">
                                <label>Template</label>
                                <select name="master_invoice_id" id="templateSelect" class="form-control" required>
                                    <option value="">-- Pilih Template --</option>
                                    @foreach ($templates as $t)
                                        <option value="{{ $t->id }}">{{ $t->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            {{-- DATA --}}
                            <div class="row">
                                <div class="col-md-4 mb-2">
                                    <div class="form-group">
                                        <label>Sumber</label>
                                        <input name="sumber" class="form-control" placeholder="Sumber" required>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-2">
                                    <div class="form-group">
                                        <label>Profit</label>
                                        <input type="text" id="profit" name="profit" class="form-control" required>
                                    </div>
                                </div>

                                <div class="col-md-4 mb-2">
                                    <div class="form-group">
                                        <label>Date</label>
                                        <input type="date" name="date" class="form-control" placeholder="Date"
                                            required>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-2">
                                    <div class="form-group">
                                        <label>To</label>
                                        <input name="to" class="form-control" placeholder="To">
                                    </div>
                                </div>
                                <div class="col-md-4 mb-2">
                                    <div class="form-group">
                                        <label>From</label>
                                        <input name="from" class="form-control" placeholder="From">
                                    </div>
                                </div>
                                <div class="col-md-4 mb-2">
                                    <div class="form-group">
                                        <label>Invoice Info</label>
                                        <input name="info_invoice" class="form-control" placeholder="Invoice Info">
                                    </div>
                                </div>
                                <div class="col-md-4 mb-2">
                                    <div class="form-group">
                                        <label>Guest Name</label>
                                        <input name="guest_name" class="form-control" placeholder="Guest Name">
                                    </div>
                                </div>

                                <div class="col-md-4 mb-2">
                                    <div class="form-group">
                                        <label>Hotel Name</label>
                                        <input name="hotel_name" class="form-control" placeholder="Hotel Name">
                                    </div>
                                </div>
                                <div class="col-md-4 mb-2">
                                    <div class="form-group">
                                        <label>Arrival Date</label>
                                        <input type="date" name="arrival_date" class="form-control"
                                            placeholder="Arrival Date">
                                    </div>
                                </div>
                                <div class="col-md-4 mb-2">
                                    <div class="form-group">
                                        <label>Departure Date</label>
                                        <input type="date" name="departure_date" class="form-control"
                                            placeholder="Departure Date">
                                    </div>
                                </div>
                                <div class="col-md-4 mb-2">
                                    <div class="form-group">
                                        <label>Total</label>
                                        <input type="text" name="total" class="form-control" placeholder="Total">
                                    </div>
                                </div>
                                <div class="col-md-4 mb-2">
                                    <div class="form-group">
                                        <label>Company Logo</label>
                                        <input type="file" name="company_logo" class="form-control"
                                            accept="image/png,image/jpeg,image/jpg">
                                    </div>
                                </div>

                                <div class="col-md-4 mb-2">
                                    <div class="form-group">
                                        <label>Bank Account Name</label>
                                        <input type="text" name="bank_account_name" class="form-control"
                                            placeholder="Bank Account Name">
                                    </div>
                                </div>
                                <div class="col-md-4 mb-2">
                                    <div class="form-group">
                                        <label>Bank Name</label>
                                        <input type="text" name="bank_name" class="form-control" placeholder="Bank Name">
                                    </div>
                                </div>

                                <div class="col-md-4 mb-2">
                                    <div class="form-group">
                                        <label>Bank Branch</label>
                                        <input type="text" name="bank_branch" class="form-control"
                                            placeholder="Bank Branch">
                                    </div>
                                </div>
                                <div class="col-md-4 mb-2">
                                    <div class="form-group">
                                        <label>Bank Account Number</label>
                                        <input type="text" name="bank_account_number" class="form-control"
                                            placeholder="Bank Account Number">
                                    </div>
                                </div>
                                <div class="col-md-4 mb-2">
                                    <div class="form-group">
                                        <label>IBAN</label>
                                        <input type="text" name="bank_iban" class="form-control" placeholder="IBAN">
                                    </div>
                                </div>
                                <div class="col-md-4 mb-2">
                                    <div class="form-group">
                                        <label>Swift Code</label>
                                        <input type="text" name="bank_swift" class="form-control"
                                            placeholder="Swift Code">
                                    </div>
                                </div>

                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label>Remarks</label>
                                        <textarea name="remarks" id="remarks" placeholder="Remarks" rows="4" cols="50" class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-2 mb-2">
                                    <div class="form-group">
                                        <label>URL WEB</label>
                                        <input type="text" name="url_web" class="form-control" placeholder="URL WEB">
                                    </div>
                                </div>
                            </div>

                            <hr>

                            {{-- CONTENT --}}
                            <textarea id="content" name="content"></textarea>

                            <div class="text-end mt-3">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('assets/tinymce/tinymce.min.js') }}"></script>

    <script>
        let baseTemplate = '';

        tinymce.init({
            selector: '#content',
            height: 1050,
            license_key: 'gpl',
            plugins: 'code table',
            toolbar: 'undo redo | bold italic | table | code',
            setup: editor => {
                editor.on('init', () => {
                    baseTemplate = editor.getContent();
                });
            }
        });

        // LOAD TEMPLATE
        $('#templateSelect').on('change', function() {
            let id = $(this).val();
            if (!id) return;

            $.get('/invoice-template/' + id, res => {
                baseTemplate = res.content;
                tinymce.get('content').setContent(res.content);
            });
        });

        // SUBMIT
        $('#invoiceForm').on('submit', function(e) {
            e.preventDefault();
            tinymce.triggerSave();

            let fd = new FormData(this);

            $.ajax({
                url: "{{ route('invoices.store') }}",
                method: "POST",
                data: fd,
                processData: false,
                contentType: false,
                success: function(res) {

                    // 🔔 TAMPILKAN TOAST DULU
                    toast(res.type, res.title, res.message);

                    if (res.success) {

                        // 🖨️ BUKA PRINT (TAB BARU)
                        window.open('/invoices/' + res.id + '/print', '_blank');

                        // ⏱️ TIMER 5 DETIK → REDIRECT KE INDEX
                        setTimeout(function() {
                            window.location.href = "{{ route('invoices.index') }}";
                        }, 5000);
                    }
                },
                error: function(xhr) {
                    toast('error', 'Gagal', 'Terjadi kesalahan saat menyimpan');
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
