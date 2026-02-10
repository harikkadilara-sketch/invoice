<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\InvoiceTemplateSection;

class InvoiceTemplateSectionSeeder extends Seeder
{
    public function run(): void
    {
        $templateId = 1; // Travel Template

        $sections = [
            ['header', 'Header & Logo'],
            ['company_info', 'Company Information'],
            ['reservation_info', 'Reservation Information'],
            ['guest_hotel_info', 'Guest & Hotel Information'],
            ['invoice_items', 'Invoice Items'],
            ['summary', 'Summary'],
            ['remarks', 'Remarks'],
            ['bank_info', 'Bank Information'],
            ['footer', 'Footer'],
        ];

        $order = 1;
        foreach ($sections as [$key, $label]) {
            InvoiceTemplateSection::create([
                'invoice_template_id' => $templateId,
                'section_key' => $key,
                'label' => $label,
                'is_active' => 1,
                'order' => $order++,
            ]);
        }
    }
}