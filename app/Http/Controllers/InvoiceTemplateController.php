<?php

namespace App\Http\Controllers;

use App\Models\InvoiceTemplate;
use Illuminate\Http\Request;
class InvoiceTemplateController extends Controller
{
    public function index()
    {
        return view('invoice_templates.index', [
            'templates' => InvoiceTemplate::latest()->get()
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'code' => 'required|unique:invoice_templates,code'
        ]);

        InvoiceTemplate::create([
            'name' => $request->name,
            'code' => $request->code,
            'is_active' => 1
        ]);

        return response()->json([
            'message' => 'Template berhasil ditambahkan'
        ]);
    }

    public function show(InvoiceTemplate $invoiceTemplate)
    {
        return response()->json($invoiceTemplate);
    }

    public function update(Request $request, InvoiceTemplate $invoiceTemplate)
    {
        $request->validate([
            'name' => 'required',
            'code' => 'required|unique:invoice_templates,code,' . $invoiceTemplate->id
        ]);

        $invoiceTemplate->update([
            'name' => $request->name,
            'code' => $request->code,
            'is_active' => $request->is_active ?? 1
        ]);

        return response()->json([
            'message' => 'Template berhasil diupdate'
        ]);
    }

    public function destroy(InvoiceTemplate $invoiceTemplate)
    {
        $invoiceTemplate->delete();

        return response()->json([
            'message' => 'Template berhasil dihapus'
        ]);
    }

    
    public function config(InvoiceTemplate $template)
    {
        return response()->json([
            'sections' => $template->sections()->orderBy('order')->get(),
            'fields'   => $template->fields()->orderBy('order')->get(),
        ]);
    }
}