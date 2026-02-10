<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\InvoiceTemplateField;

class InvoiceTemplateFieldSeeder extends Seeder
{
    public function run(): void
    {
        $templateId = 1;

        $fields = [

            // ================= HEADER =================
            ['header','invoice_date','Date','date','editable',1],
            ['header','hijri_date','Date (Hijri)','text','auto',0],
            ['header','invoice_number','Invoice No','text','auto',0],
            ['header','title','Title','text','readonly',0],

            // ================= COMPANY INFO =================
            ['company_info','company_name','From','text','readonly',1],
            ['company_info','commercial_registration','Commercial Registration No','text','readonly',1],
            ['company_info','license_number','License Number','text','readonly',0],
            ['company_info','vat_number','VAT No','text','readonly',1],

            // ================= RESERVATION =================
            ['reservation_info','reservation_no','Res. No','text','editable',1],
            ['reservation_info','arrival_date','Arrival Date','date','editable',1],
            ['reservation_info','departure_date','Depart. Date','date','editable',1],

            // ================= GUEST & HOTEL =================
            ['guest_hotel_info','guest_name','Guest Name','text','editable',1],
            ['guest_hotel_info','hotel_name','Hotel Name','text','editable',1],
            ['guest_hotel_info','room_type','Room Type','text','editable',1],
            ['guest_hotel_info','meal_plan','Meal','text','editable',0],

            // ================= SUMMARY =================
            ['summary','subtotal','Subtotal','text','auto',0],
            ['summary','vat','VAT','number','editable',1],
            ['summary','total','Total','text','auto',0],
            ['summary','paid','Paid','number','editable',0],
            ['summary','remaining','Remaining','text','auto',0],

            // ================= REMARKS =================
            ['remarks','remarks','Remarks','textarea','editable',0],

            // ================= BANK INFO =================
            ['bank_info','bank_name','Bank Name','text','readonly',0],
            ['bank_info','account_name','Account Name','text','readonly',0],
            ['bank_info','iban','IBAN','text','readonly',0],
            ['bank_info','swift_code','Swift Code','text','readonly',0],
        ];

        $order = 1;
        foreach ($fields as $f) {
            InvoiceTemplateField::create([
                'invoice_template_id' => $templateId,
                'section_key' => $f[0],
                'field_key' => $f[1],
                'label' => $f[2],
                'type' => $f[3],
                'input_mode' => $f[4], // auto | editable | readonly
                'is_required' => $f[5],
                'order' => $order++,
            ]);
        }
    }
}