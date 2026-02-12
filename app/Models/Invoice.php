<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

// class Invoice extends Model
// {
//     protected $fillable = [
//         'invoice_no',
//         'master_invoice_id',
//         'date',
//         'to',
//         'from',
//         'res_no',
//         'arrival_date',
//         'depart_date',
//         'guest_name',
//         'hotel_name',
//         'total',
//         'remarks',
//         'bank_account_name',
//         'bank_name',
//         'bank_branch',
//         'bank_account_number',
//         'bank_iban',
//         'bank_swift',
//         'content',
//         'is_active',
//         'created_by',
//         'info_invoice',
//         'profit',
//         'sumber',
//         'url_web',
//     ];

//     public function masterTemplate()
//     {
//         return $this->belongsTo(MasterInvoice::class, 'master_invoice_id');
//     }
// }

class Invoice extends Model
{
    protected $fillable = [
        'master_invoice_id',
        'invoice_no',
        'res_no',
        'date',
        'to',
        'from',
        'guest_name',
        'hotel_name',
        'arrival_date',
        'departure_date',
        'company_logo',
        'content',
        'currency',
        'total',
        'remarks',
        'bank_account_name',
        'bank_name',
        'bank_branch',
        'bank_account_number',
        'bank_iban',
        'bank_swift',
        'info_invoice',
        'profit',
        'sumber',
        'url_web',
        'created_by'
    ];

    protected $casts = [
        'date' => 'date',
        'profit' => 'decimal:2'
    ];
    public function masterTemplate()
    {
        return $this->belongsTo(MasterInvoice::class, 'master_invoice_id');
    }
}