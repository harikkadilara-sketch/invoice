<table width="100%" style="margin-top:10px">
    <tr>
        <td width="60%">
            <strong>Our Bank A/C</strong><br>
            {!! nl2br(e($invoice->bank_info ?? '-')) !!}
        </td>
        <td width="40%" align="right">
            Thanks and Best Regards<br><br>
            <strong>Reservation Agent</strong><br>
            {{ $invoice->agent_name ?? '-' }}
        </td>
    </tr>
</table>
