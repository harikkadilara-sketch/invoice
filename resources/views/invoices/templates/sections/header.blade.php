<table width="100%">
    <tr>
        <td width="20%">
            @if ($invoice->company->logo)
                <img src="{{ public_path('storage/' . $invoice->company->logo) }}" width="70">
            @endif
        </td>
        <td width="60%" align="center">
            <strong>{{ strtoupper($invoice->company->name) }}</strong>
        </td>
        <td width="20%" align="right">
            <strong>Definite Confirmation</strong>
        </td>
    </tr>
</table>
<hr>
