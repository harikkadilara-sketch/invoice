<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InvoiceTemplateField extends Model
{
    protected $fillable = [
        'invoice_template_id','field_key','label','type','is_required','order'
    ];
}