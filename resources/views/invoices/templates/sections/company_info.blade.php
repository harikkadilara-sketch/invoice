<table width="100%">
    <tr>
        <td width="50%">
            <table>
                <tr>
                    <td><strong>Date</strong></td>
                    <td>: {{ $invoice->invoice_date }}</td>
                </tr>
                <tr>
                    <td><strong>Date (Hijri)</strong></td>
                    <td>: {{ $invoice->hijri_date ?? '-' }}</td>
                </tr>
                <tr>
                    <td><strong>To</strong></td>
                    <td>: {{ $invoice->client->name }}</td>
                </tr>
                <tr>
                    <td><strong>From</strong></td>
                    <td>: {{ $invoice->company->name }}</td>
                </tr>
                <tr>
                    <td><strong>VAT No</strong></td>
                    <td>: {{ $invoice->company->vat_number }}</td>
                </tr>
            </table>
        </td>
        <td width="50%">
            Thank you for your interest on {{ $invoice->company->name }} Company
        </td>
    </tr>
</table>
<hr>
