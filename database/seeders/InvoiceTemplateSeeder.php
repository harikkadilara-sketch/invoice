<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\InvoiceTemplate;

class InvoiceTemplateSeeder extends Seeder
{
    public function run(): void
    {
        InvoiceTemplate::insert([
            [
                'code' => 'travel',
                'name' => 'Travel / Hotel',
                'view_path' => 'invoices.templates.travel',
                'is_active' => 1,
            ],
            [
                'code' => 'simple',
                'name' => 'Simple',
                'view_path' => 'invoices.templates.simple',
                'is_active' => 1,
            ],
            [
                'code' => 'corporate',
                'name' => 'Corporate',
                'view_path' => 'invoices.templates.corporate',
                'is_active' => 1,
            ],
        ]);
    }
}