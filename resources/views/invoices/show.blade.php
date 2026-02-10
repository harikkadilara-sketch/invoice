@extends('layouts.app')
@section('title', 'Invoice ' . $invoice->invoice_number)

@section('content')

    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h5>Invoice #{{ $invoice->invoice_number }}</h5>
            <a href="{{ route('invoices.pdf', $invoice->id) }}" target="_blank" class="btn btn-sm btn-danger">
                Export PDF
            </a>
        </div>

        <div class="card-body">

            {{-- ================= HEADER ================= --}}
            <div class="row mb-3">
                <div class="col-md-6">
                    <strong>{{ $invoice->company->name }}</strong><br>
                    VAT No: {{ $invoice->company->vat_number ?? '-' }}<br>
                    {{ $invoice->company->address ?? '' }}
                </div>

                <div class="col-md-6 text-right">
                    <strong>Invoice Date:</strong> {{ $invoice->invoice_date->format('d/m/Y') }}<br>
                    <strong>Client:</strong> {{ $invoice->client->name }}
                </div>
            </div>

            {{-- ================= TEMPLATE SECTIONS ================= --}}
            @foreach ($invoice->template->sections->where('section_key', '!=', 'summary')->sortBy('order') as $section)
                @if ($section->is_active)
                    <div class="card mb-3">
                        <div class="card-header">
                            {{ $section->label }}
                        </div>
                        <div class="card-body">

                            <table class="table table-sm table-borderless">
                                @foreach ($invoice->template->fields->where('section_key', $section->section_key)->sortBy('order') as $field)
                                    @php
                                        $value = $invoice->meta[$field->field_key] ?? '';
                                    @endphp

                                    @if ($value !== '')
                                        <tr>
                                            <th width="35%">{{ $field->label }}</th>
                                            <td>{{ $value }}</td>
                                        </tr>
                                    @endif
                                @endforeach
                            </table>

                        </div>
                    </div>
                @endif
            @endforeach

            {{-- ================= INVOICE ITEMS ================= --}}
            <div class="card mb-3">
                <div class="card-header">Invoice Items</div>
                <div class="card-body p-0">
                    <table class="table table-bordered mb-0">
                        <thead>
                            <tr>
                                <th>Description</th>
                                <th width="80">Qty</th>
                                <th width="120">Price</th>
                                <th width="120">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($invoice->items as $item)
                                <tr>
                                    <td>{{ $item->description }}</td>
                                    <td>{{ $item->qty }}</td>
                                    <td>SAR {{ number_format($item->price, 2) }}</td>
                                    <td>SAR {{ number_format($item->total, 2) }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            {{-- ================= SUMMARY (FROM invoice_template_fields) ================= --}}
            <div class="card">
                <div class="card-header">Summary</div>
                <div class="card-body">

                    <table class="table table-sm table-borderless">
                        @foreach ($invoice->template->fields->where('section_key', 'summary')->sortBy('order') as $field)
                            @php
                                $value = $invoice->meta[$field->field_key] ?? 0;
                            @endphp

                            <tr>
                                <th width="40%">{{ $field->label }}</th>
                                <td>
                                    SAR {{ number_format($value, 2) }}

                                    {{-- TERBILANG KHUSUS SUBTOTAL --}}
                                    @if ($field->field_key === 'subtotal')
                                        <br>
                                        <small class="text-muted">
                                            (Only {{ \App\Helpers\NumberToWords::convert($value) }} SAR)
                                        </small>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </table>

                </div>
            </div>

        </div>
    </div>

@endsection
