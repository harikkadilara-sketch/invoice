<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InvoiceTemplateSection extends Model
{
    protected $fillable = [
        'invoice_template_id',
        'section_key',
        'label',
        'is_active',
        'order'
    ];
}