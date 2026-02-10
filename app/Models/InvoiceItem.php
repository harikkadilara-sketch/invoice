<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $fillable = [
        'invoice_number',
        'master_invoice_id',
        'content',
        'invoice_date',
        'is_paid',
        'created_by'
    ];

    public function template()
    {
        return $this->belongsTo(MasterInvoice::class, 'master_invoice_id');
    }
}