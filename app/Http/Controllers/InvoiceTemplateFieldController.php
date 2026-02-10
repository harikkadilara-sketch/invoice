<?php

namespace App\Http\Controllers;

use App\Models\InvoiceTemplate;
use App\Models\InvoiceTemplateField;
use Illuminate\Http\Request;

class InvoiceTemplateFieldController extends Controller
{
    /**
     * List template (untuk sidebar)
     */
    public function list()
    {
        return view('invoice_template_fields.list', [
            'templates' => InvoiceTemplate::all()
        ]);
    }

    /**
     * CRUD field per template
     */
    public function index(InvoiceTemplate $template)
    {
        return view('invoice_template_fields.index', [
            'template' => $template,
            'fields'   => $template->fields()->orderBy('order')->get()
        ]);
    }

    /**
     * Add field
     */
    public function store(Request $request, InvoiceTemplate $template)
    {
        $template->fields()->create([
            'field_key'   => $request->field_key,
            'label'       => $request->label,
            'type'        => $request->type,
            'is_required' => $request->is_required ? 1 : 0,
            'order'       => $template->fields()->count() + 1,
        ]);

        return response()->json([
            'message' => 'Field added'
        ]);
    }

    /**
     * Reorder (drag & drop)
     */
    public function reorder(Request $request)
    {
        foreach ($request->fields as $field) {
            InvoiceTemplateField::where('id', $field['id'])
                ->update(['order' => $field['order']]);
        }

        return response()->json([
            'message' => 'Field order updated'
        ]);
    }

    /**
     * Delete field
     */
    public function destroy(InvoiceTemplateField $field)
    {
        $field->delete();

        return response()->json([
            'message' => 'Field deleted'
        ]);
    }
}