<?php
// app/Http/Controllers/MasterInvoiceController.php
namespace App\Http\Controllers;

use App\Models\MasterInvoice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;

class MasterInvoiceController extends Controller
{
    public function index()
    {
        $templates = MasterInvoice::latest()->get();
        return view('masterinvoice.index', compact('templates'));
    }

    public function create()
    {
        return view('masterinvoice.create');
    }

    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'name' => 'required',
    //         'code' => 'required|unique:master_invoices,code',
    //         'content' => 'required'
    //     ]);

    //     MasterInvoice::create($request->all());

    //     return redirect()->route('masterinvoice.index')
    //         ->with('success', 'Template berhasil ditambahkan');
    // }

    public function store(Request $request)
    {
    
        try {

            DB::beginTransaction();

            $invoice = MasterInvoice::create([
                'name'        => $request->name,
                'code'          => $this->generateCode(),
                'content'     => $request->content,
                'description' => $request->description,
                'is_active'   => $request->is_active ?? 0,
                'created_by'  => auth()->id()
            ]);

            DB::commit();

            return response()->json([
                'success' => true,
                'type'    => 'success',
                'title'   => 'Berhasil',
                'message' => 'Invoice berhasil disimpan',
                'data'    => $invoice
            ], 200);

        } catch (\Throwable $e) {

            DB::rollBack();

            Log::error('MasterInvoice Store Error', [
                'message' => $e->getMessage(),
                'line'    => $e->getLine(),
                'file'    => $e->getFile(),
            ]);

             return response()->json([
                'success' => false,
                'type'    => 'error',
                'title'   => 'Gagal',
                'message' => $e->getMessage(), // 🔥 tampilkan error asli
            ], 500);
        }
    }

    // public function edit(MasterInvoice $masterinvoice)
    // {
    //     return view('masterinvoice.edit', compact('masterinvoice'));
    // }

    public function edit(MasterInvoice $masterinvoice)
    {
        $invoice = MasterInvoice::findOrFail($masterinvoice->id);
        return view('masterinvoice.edit', compact('invoice'));
    }

    public function update(Request $request, $id)
    {
       
         $request->validate([
            'name' => 'required',
            'content' => 'required'
        ]);
        try {
            $template = MasterInvoice::findOrFail($id);

            $template->update([
                'name'        => $request->name,
                'description' => $request->description,
                'content'     => $request->content, // wajib ada
                'is_active'   => $request->has('is_active') ? 1 : 0,
            ]);

            return response()->json([
                'success' => true,
                'type'    => 'success',
                'title'   => 'Berhasil',
                'message' => 'Master template berhasil diupdate'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'type'    => 'error',
                'title'   => 'Gagal',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    

    public function destroy(MasterInvoice $masterinvoice)
    {
        $masterinvoice->delete();

        return redirect()->route('masterinvoice.index')
            ->with('success', 'Template berhasil dihapus');
    }

    
    private function generateCode()
    {
        $year = Carbon::now()->year;

        $last = MasterInvoice::whereYear('created_at', $year)
            ->orderBy('id', 'desc')
            ->first();

        $number = $last
            ? ((int) substr($last->code, -4)) + 1
            : 1;

        return 'INV-TPL-' . $year . '-' . str_pad($number, 4, '0', STR_PAD_LEFT);
    }
        public function getContent($id)
    {
        $template = MasterInvoice::findOrFail($id);

        return response()->json([
            'content' => $template->content
        ]);
    }

}