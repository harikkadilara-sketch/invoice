<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $totalHotel = DB::table('invoices')
        ->whereNotNull('hotel_name')
        ->whereRaw("TRIM(hotel_name) <> ''")
        ->selectRaw("COUNT(DISTINCT LOWER(TRIM(hotel_name))) as total_hotel")
        ->value('total_hotel');
        $hotels = DB::table('invoices')
            ->selectRaw("
                LOWER(TRIM(hotel_name)) as hotel_name,
                COUNT(*) as total
            ")
            ->whereNotNull('hotel_name')
            ->whereRaw("TRIM(hotel_name) <> ''")
            ->groupByRaw("LOWER(TRIM(hotel_name))")
            ->orderByDesc('total')
            ->get();
        $data = [
            'totalInvoice' => Invoice::count(),
            'totalAmount' => Invoice::sum('profit'),
            'invoices' => Invoice::latest()->get(),
            'totalHotel' => $totalHotel,
            'listHotel' => $hotels,

            //'paidInvoice'  => Invoice::where('status','paid')->count(),
            //'pendingInvoice' => Invoice::where('status','sent')->count(),
            //'totalAmount' => Invoice::sum('*')
        ];

        return view('dashboard.index', compact('data'));
    }
}