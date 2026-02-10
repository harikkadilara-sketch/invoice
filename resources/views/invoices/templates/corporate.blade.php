<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <style>
        body {
            font-family: DejaVu Sans;
            font-size: 12px;
        }

        h2 {
            margin: 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 6px;
        }

        .line {
            border-bottom: 2px solid #000;
            margin: 8px 0;
        }

        .text-right {
            text-align: right;
        }

        .bold {
            font-weight: bold;
        }
    </style>
</head>

<body>

    {{-- HEADER --}}
    <h2>{{ $invoice->company->name }}</h2>
    <div class="line"></div>

    <table>
        <tr>
            <td width="60%">
                <strong>Invoice To:</strong><br>
                {{ $invoice->client->name }}<br>
                {{ $invoice->client->address }}
            </td>
            <td width="40%" class="text-right">
                Invoice No: {{ $invoice->invoice_number }}<br>
                Date: {{ $invoice->invoice_date }}
            </td>
        </tr>
    </table>

    <br>

    <table border="1">
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
                    <td class="text-right">{{ $item->qty }}</td>
                    <td class="text-right">{{ number_format($item->price, 2) }}</td>
                    <td class="text-right">{{ number_format($item->total, 2) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <br>

    <table width="40%" align="right" border="1">
        <tr>
            <td>Subtotal</td>
            <td class="text-right">{{ number_format($invoice->subtotal, 2) }}</td>
        </tr>
        <tr>
            <td>VAT</td>
            <td class="text-right">{{ number_format($invoice->vat, 2) }}</td>
        </tr>
        <tr class="bold">
            <td>Total</td>
            <td class="text-right">{{ number_format($invoice->total, 2) }}</td>
        </tr>
    </table>

    <br clear="all">

    @if ($invoice->notes)
        <p><strong>Notes:</strong><br>{{ $invoice->notes }}</p>
    @endif

    <p>
        <strong>{{ $invoice->company->name }}</strong><br>
        VAT No: {{ $invoice->company->vat_number }}
    </p>

</body>

</html>
