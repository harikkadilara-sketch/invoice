<table border="1" width="100%" cellpadding="4" cellspacing="0">
    <thead>
        <tr>
            <th>QTY</th>
            <th>Room Type</th>
            <th>Room Rate</th>
            <th>Meal</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($invoice->items as $item)
            <tr>
                <td align="center">{{ $item->qty }}</td>
                <td>{{ $item->description }}</td>
                <td align="right">{{ number_format($item->price, 2) }}</td>
                <td align="center">{{ $item->meal ?? 'RO' }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
