<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">

    <style>
        @page {
            margin: 25px;
        }

        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 11px;
            color: #000;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        .header {
            text-align: center;
            margin-bottom: 10px;
        }

        .header img {
            height: 55px;
        }

        .title {
            position: absolute;
            right: 40px;
            top: 140px;
            transform: rotate(-35deg);
            font-size: 16px;
            font-weight: bold;
        }

        .info td {
            padding: 2px 4px;
            vertical-align: top;
        }

        .line {
            border-top: 2px solid #000;
            margin: 6px 0;
        }

        .items th,
        .items td {
            border: 2px solid #000;
            padding: 4px;
            text-align: center;
        }

        .items th {
            font-weight: bold;
        }

        .box {
            border: 2px solid #000;
            padding: 6px;
            margin-top: 6px;
        }

        .summary td {
            padding: 3px 4px;
        }

        .remarks {
            font-size: 10px;
            line-height: 1.4;
        }

        .footer {
            margin-top: 10px;
            font-size: 10px;
        }
    </style>
</head>

<body>

    {{-- HEADER --}}
    <div class="header">
        <img src="{{ public_path('logo.png') }}">
        <div><strong>TRAVEL TIME COMPANY</strong></div>
    </div>

    <div class="title">Definite Confirmation</div>

    {{-- INFO --}}
    <table class="info">
        <tr>
            <td width="50%">
                Date : {{ \Carbon\Carbon::parse($invoice->invoice_date)->format('d/m/Y') }}<br>
                Date (Hijri) : 01/08/1447<br>
                To : {{ $invoice->client->name }}<br>
                From : {{ $invoice->company->name }}<br>
                Commercial Registration No : 7037869620<br>
                License Number : —<br>
                VAT No : 312008149700003
            </td>

            <td width="50%">
                Res No : {{ $invoice->id }}<br>
                Arrival date : {{ data_get($invoice->meta, 'arrival_date') }}<br>
                Guest Name : {{ data_get($invoice->meta, 'guest_name') }}<br>
                Hotel name : {{ data_get($invoice->meta, 'hotel_name') }}<br>
                Depart date : {{ data_get($invoice->meta, 'depart_date') }}
            </td>
        </tr>
    </table>

    <div class="line"></div>

    {{-- ITEMS --}}
    <table class="items">
        <thead>
            <tr>
                <th width="10%">QTY</th>
                <th width="40%">Room Type View</th>
                <th width="25%">Room Rate</th>
                <th width="25%">Meal</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($invoice->items as $item)
                <tr>
                    <td>{{ $item->qty }}</td>
                    <td>{{ $item->description }}</td>
                    <td>{{ number_format($item->price, 2) }}</td>
                    <td>RO</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="box">
        Net Accommodation Charge :
        <strong>SAR {{ number_format(data_get($invoice->meta, 'subtotal'), 2) }}</strong>
    </div>

    {{-- SUMMARY --}}
    <div class="box">
        <table class="summary">
            <tr>
                <td>Total</td>
                <td>SAR {{ number_format(data_get($invoice->meta, 'subtotal'), 2) }}</td>
            </tr>
            <tr>
                <td>VAT</td>
                <td>SAR {{ number_format(data_get($invoice->meta, 'vat'), 2) }}</td>
            </tr>
            <tr>
                <td><strong>Total Net Value</strong></td>
                <td><strong>SAR {{ number_format(data_get($invoice->meta, 'total'), 2) }}</strong></td>
            </tr>
            <tr>
                <td>Paid</td>
                <td>SAR {{ number_format(data_get($invoice->meta, 'paid'), 2) }}</td>
            </tr>
            <tr>
                <td>Remain</td>
                <td>SAR {{ number_format(data_get($invoice->meta, 'remaining'), 2) }}</td>
            </tr>
        </table>
    </div>

    {{-- REMARKS --}}
    <div class="box remarks">
        {!! nl2br(e(data_get($invoice->meta, 'remarks'))) !!}
    </div>

    {{-- FOOTER --}}
    <div class="footer">
        Bank Name : RIYAD BANK<br>
        IBAN : SA582600009126620859940<br>
        Swift Code : RIBLSARI<br><br>

        <strong>Reservation Agent</strong><br>
        JANASAAD
    </div>

</body>

</html>
