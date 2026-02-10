<h2>{{ $invoice->company->name }}</h2>
<p>Invoice: {{ $invoice->invoice_number }}</p>

<table border="1" width="100%">
    <tr>
        <th>Desc</th>
        <th>Qty</th>
        <th>Price</th>
    </tr>
    @foreach ($invoice->items as $i)
        <tr>
            <td>{{ $i->description }}</td>
            <td>{{ $i->qty }}</td>
            <td>{{ $i->price }}</td>
        </tr>
    @endforeach
</table>

<p>Total: {{ $invoice->total }}</p>
