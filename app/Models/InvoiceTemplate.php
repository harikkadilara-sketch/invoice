<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\InvoiceTemplateField;

class InvoiceTemplate extends Model
{
    protected $fillable = [
        'name',
        'code',
        'is_active'
    ];

    /**
     * RELATION: template -> fields
     */
    public function fields()
    {
        return $this->hasMany(
            InvoiceTemplateField::class,
            'invoice_template_id'
        )->orderBy('order');
    }
    public function sections()
    {
        return $this->hasMany(InvoiceTemplateSection::class)
                    ->orderBy('order');
    }
}