<?php

namespace App\Http\Controllers;

use App\Models\InvoiceTemplate;
use App\Models\InvoiceTemplateSection;
use Illuminate\Http\Request;

class InvoiceTemplateSectionController extends Controller
{
    /**
     * List template (untuk sidebar)
     */
    public function list()
    {
        return view('invoice_template_sections.list', [
            'templates' => InvoiceTemplate::all()
        ]);
    }

    /**
     * Manage section per template
     */
    public function index(InvoiceTemplate $template)
    {
        return view('invoice_template_sections.index', [
            'template' => $template,
            'sections' => $template->sections
        ]);
    }

    /**
     * Add new section
     */
    public function store(Request $request, InvoiceTemplate $template)
    {
        $template->sections()->create([
            'section_key' => $request->section_key,
            'label'       => $request->label,
            'is_active'   => 1,
            'order'       => $template->sections()->count() + 1
        ]);

        return response()->json([
            'message' => 'Section added'
        ]);
    }

    /**
     * Save order + ON/OFF
     */
    public function reorder(Request $request)
    {
        foreach ($request->sections as $s) {
            InvoiceTemplateSection::where('id', $s['id'])
                ->update([
                    'order'     => $s['order'],
                    'is_active' => $s['is_active']
                ]);
        }

        return response()->json([
            'message' => 'Template sections updated'
        ]);
    }
}