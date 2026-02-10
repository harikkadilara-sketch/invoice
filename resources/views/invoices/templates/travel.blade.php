<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <style>
        body {
            font-family: DejaVu Sans;
            font-size: 11px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        td,
        th {
            padding: 4px;
            vertical-align: top;
        }

        .border {
            border: 1px solid #000;
        }

        .text-right {
            text-align: right;
        }

        .text-center {
            text-align: center;
        }

        .bold {
            font-weight: bold;
        }

        .hr {
            border-top: 1px solid #000;
            margin: 6px 0;
        }

        .rotate {
            transform: rotate(-45deg);
            font-size: 15px;
            font-weight: bold;
        }
    </style>
</head>

<body>
    @foreach ($invoice->template->sections as $section)
        @if ($section->is_active)
            @include('invoices.templates.sections.' . $section->section_key)
        @endif
    @endforeach
    {{-- HEADER --}}
    <table>
        <tr>
            <td width="20%">
                @if ($invoice->company->logo)
                    <img src="{{ public_path('storage/' . $invoice->company->logo) }}" width="70">
                @endif
            </td>
            <td width="60%" class="text-center">
                <strong>{{ strtoupper($invoice->company->name) }}</strong>
            </td>
            <td width="20%" class="text-right rotate">
                Definite Confirmation
            </td>
        </tr>
    </table>

    <div class="hr"></div>

    {{-- COMPANY INFO --}}
    <table>
        <tr>
            <td width="55%">
                <table>
                    <tr>
                        <td class="bold">Date</td>
                        <td>: {{ $invoice->invoice_date }}</td>
                    </tr>
                    <tr>
                        <td class="bold">Date (Hijri)</td>
                        <td>: {{ $invoice->hijri_date ?? '-' }}</td>
                    </tr>
                    <tr>
                        <td class="bold">To</td>
                        <td>: {{ $invoice->client->name }}</td>
                    </tr>
                    <tr>
                        <td class="bold">From</td>
                        <td>: {{ $invoice->company->name }}</td>
                    </tr>
                    <tr>
                        <td class="bold">Commercial Reg No</td>
                        <td>: {{ $invoice->company->registration_number }}</td>
                    </tr>
                    <tr>
                        <td class="bold">VAT No</td>
                        <td>: {{ $invoice->company->vat_number }}</td>
                    </tr>
                </table>
            </td>
            <td width="45%">
                Thank you for your interest on {{ $invoice->company->name }} Company
            </td>
        </tr>
    </table>

    <div class="hr"></div>

    {{-- RESERVATION --}}
    <table>
        <tr>
            <td width="50%">
                <table>
                    <tr>
                        <td class="bold">Res. No</td>
                        <td>: {{ $invoice->reservation_no ?? '-' }}</td>
                    </tr>
                    <tr>
                        <td class="bold">Arrival Date</td>
                        <td>: {{ $invoice->arrival_date ?? '-' }}</td>
                    </tr>
                    <tr>
                        <td class="bold">Guest Name</td>
                        <td>: {{ $invoice->guest_name ?? '-' }}</td>
                    </tr>
                </table>
            </td>
            <td width="50%">
                <table>
                    <tr>
                        <td class="bold">Hotel Name</td>
                        <td>: {{ $invoice->hotel_name ?? '-' }}</td>
                    </tr>
                    <tr>
                        <td class="bold">Depart. Date</td>
                        <td>: {{ $invoice->departure_date ?? '-' }}</td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>

    <div class="hr"></div>

    {{-- ITEM --}}
    <table class="border">
        <thead>
            <tr>
                <th class="border">QTY</th>
                <th class="border">Room Type</th>
                <th class="border">Room Rate</th>
                <th class="border">Meal</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($invoice->items as $item)
                <tr>
                    <td class="border text-center">{{ $item->qty }}</td>
                    <td class="border">{{ $item->description }}</td>
                    <td class="border text-right">{{ number_format($item->price, 2) }}</td>
                    <td class="border text-center">{{ $item->meal ?? 'RO' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{-- SUMMARY --}}
    <table class="border" style="margin-top:5px">
        <tr>
            <td class="bold">Net Accommodation Charge</td>
            <td class="text-right">SAR {{ number_format($invoice->subtotal, 2) }}</td>
        </tr>
    </table>

    <table class="border" style="margin-top:5px">
        <tr>
            <td>Total</td>
            <td class="text-right">SAR {{ number_format($invoice->subtotal, 2) }}</td>
        </tr>
        <tr>
            <td>VAT</td>
            <td class="text-right">SAR {{ number_format($invoice->vat, 2) }}</td>
        </tr>
        <tr>
            <td class="bold">Total Net Value</td>
            <td class="text-right bold">SAR {{ number_format($invoice->total, 2) }}</td>
        </tr>
        <tr>
            <td>Paid</td>
            <td class="text-right">SAR {{ number_format($invoice->paid, 2) }}</td>
        </tr>
        <tr>
            <td>Remain</td>
            <td class="text-right">SAR {{ number_format($invoice->remaining, 2) }}</td>
        </tr>
    </table>

    {{-- REMARKS --}}
    <div class="border" style="margin-top:6px;padding:5px">
        <strong>Remarks</strong><br>
        {!! nl2br(e($invoice->notes)) !!}
    </div>

    {{-- BANK --}}
    <table style="margin-top:10px">
        <tr>
            <td width="60%">
                <strong>Our Bank A/C</strong><br>
                {!! nl2br(e($invoice->bank_info ?? '-')) !!}
            </td>
            <td width="40%" class="text-right">
                Thanks and Best Regards<br><br>
                <strong>Reservation Agent</strong><br>
                {{ $invoice->agent_name ?? '-' }}
            </td>
        </tr>
    </table>

</body>

</html>
