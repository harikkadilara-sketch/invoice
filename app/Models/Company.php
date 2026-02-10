<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = [
        'name',
        'logo',
        'vat_number',
        'registration_number',
        'address',
        'currency'
    ];

    public function invoices()
    {
        return $this->hasMany(Invoice::class);
    }
}