<table border="1" width="100%" style="margin-top:6px">
    <tr>
        <td><strong>Net Accommodation Charge</strong></td>
        <td align="right">SAR {{ number_format($invoice->subtotal, 2) }}</td>
    </tr>
    <tr>
        <td>VAT</td>
        <td align="right">SAR {{ number_format($invoice->vat, 2) }}</td>
    </tr>
    <tr>
        <td><strong>Total Net Value</strong></td>
        <td align="right"><strong>SAR {{ number_format($invoice->total, 2) }}</strong></td>
    </tr>
    <tr>
        <td>Paid</td>
        <td align="right">SAR {{ number_format($invoice->paid, 2) }}</td>
    </tr>
    <tr>
        <td>Remain</td>
        <td align="right">SAR {{ number_format($invoice->remaining, 2) }}</td>
    </tr>
</table>
