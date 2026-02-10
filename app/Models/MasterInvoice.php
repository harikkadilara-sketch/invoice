<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MasterInvoice extends Model
{
    protected $table = 'master_template_invoice';

    protected $fillable = [
        'name',
        'code',
        'description',
        'content',
        'is_active',
        'created_by'
    ];

    protected $casts = [
        'is_active' => 'boolean'
    ];
}