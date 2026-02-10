<table width="100%">
    <tr>
        <td width="50%">
            <table>
                <tr>
                    <td><strong>Res. No</strong></td>
                    <td>: {{ $invoice->reservation_no ?? '-' }}</td>
                </tr>
                <tr>
                    <td><strong>Arrival Date</strong></td>
                    <td>: {{ $invoice->arrival_date ?? '-' }}</td>
                </tr>
                <tr>
                    <td><strong>Guest Name</strong></td>
                    <td>: {{ $invoice->guest_name ?? '-' }}</td>
                </tr>
            </table>
        </td>
        <td width="50%">
            <table>
                <tr>
                    <td><strong>Hotel Name</strong></td>
                    <td>: {{ $invoice->hotel_name ?? '-' }}</td>
                </tr>
                <tr>
                    <td><strong>Depart. Date</strong></td>
                    <td>: {{ $invoice->departure_date ?? '-' }}</td>
                </tr>
            </table>
        </td>
    </tr>
</table>
<hr>
