<?php

namespace App\Http\Controllers;

use App\Models\{Payment, Invoice};
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function store(Request $request)
    {
        Payment::create($request->all());

        $invoice = Invoice::find($request->invoice_id);
        $invoice->paid += $request->amount;
        $invoice->remaining = $invoice->total - $invoice->paid;
        $invoice->status = $invoice->remaining <= 0 ? 'paid' : 'sent';
        $invoice->save();

        return back();
    }
}