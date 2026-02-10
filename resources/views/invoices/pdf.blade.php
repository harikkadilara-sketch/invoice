<!DOCTYPE html>
<html>

<head>
    <style>
        body {
            font-family: DejaVu Sans;
            font-size: 12px
        }

        table {
            width: 100%;
            border-collapse: collapse
        }

        th,
        td {
            border: 1px solid #000;
            padding: 6px
        }
    </style>
</head>

<body>

    <h2>{{ $invoice->company->name }}</h2>
    <p>
        VAT: {{ $invoice->company->vat_number }}<br>
        Reg No: {{ $invoice->company->registration_number }}
    </p>

    <hr>

    <p>
        <b>To:</b> {{ $invoice->client->name }}<br>
        <b>Date:</b> {{ $invoice->invoice_date }}<br>
        <b>Invoice:</b> {{ $invoice->invoice_number }}
    </p>

    <table>
        <thead>
            <tr>
                <th>Desc</th>
                <th>Qty</th>
                <th>Rate</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($invoice->items as $i)
                <tr>
                    <td>{{ $i->description }}</td>
                    <td>{{ $i->qty }}</td>
                    <td>{{ number_format($i->price, 2) }}</td>
                    <td>{{ number_format($i->total, 2) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <p align="right">
        Subtotal: {{ number_format($invoice->subtotal, 2) }}<br>
        VAT: {{ number_format($invoice->vat, 2) }}<br>
        <b>Total: {{ number_format($invoice->total, 2) }}</b>
    </p>

    <p><b>Notes:</b><br>{{ $invoice->notes }}</p>

</body>

</html>
