<?php

namespace App\Http\Controllers;

use App\Models\Invoice;

class DashboardController extends Controller
{
    public function index()
    {
        $data = [
            'totalInvoice' => Invoice::count(),
            'totalAmount' => Invoice::sum('profit'),
            'invoices' => Invoice::latest()->get(),
            //'paidInvoice'  => Invoice::where('status','paid')->count(),
            //'pendingInvoice' => Invoice::where('status','sent')->count(),
            //'totalAmount' => Invoice::sum('*')
        ];

        return view('dashboard.index', compact('data'));
    }
}