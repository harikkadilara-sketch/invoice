<?php
namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\MasterInvoice;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;
class InvoiceController extends Controller
{
    public function index()
    {
        return view('invoices.index', [
            'invoices' => Invoice::latest()->get()
        ]);
    }

    public function create()
    {
        return view('invoices.create', [
            'templates' => MasterInvoice::where('is_active', 1)->get()
        ]);
    }

    
     /* =====================
       RENDER PLACEHOLDER
       ===================== */
    private function renderContent(string $content, array $data): string
    {
        foreach ($data as $key => $value) {
            $content = str_replace(
                ['{{ '.$key.' }}','{{'.$key.'}}'],
                $value ?? '',
                $content
            );
        }
        return $content;
    }

    /* =====================
       STORE
       ===================== */
    public function store(Request $request)
    {
        $request->validate([
            'master_invoice_id' => 'required|exists:master_template_invoice,id',
            'content'           => 'required',
            'company_logo'      => 'nullable|image|mimes:png,jpg,jpeg|max:2048'
        ]);

        try {
             /* ================= UPLOAD LOGO ================= */
            $logoUrl = '';
            if ($request->hasFile('company_logo')) {
                $path = $request->file('company_logo')->store('logos', 'public');
                $logoUrl = asset('storage/' . $path);
            }

            $resNo = 'RES-' . now()->format('Ymd') . '-' . strtoupper(Str::random(4));

            // 🔥 BACKEND RENDER (FINAL)
            $finalContent = $this->renderContent($request->content, [
                'company_logo' => $logoUrl
                ? '<img src="'.$logoUrl.'" style="max-height:80px;">'
                : '',
                'date'       => $request->date
                    ? Carbon::parse($request->date)->format('d/m/Y')
                    : '',
                'to'         => $request->to,
                'from'       => $request->from,
                'guest_name' => $request->guest_name,
                'hotel_name' => $request->hotel_name,
                'res_no'     => $resNo,
                'arrival_date' => $request->arrival_date
                    ? Carbon::parse($request->arrival_date)->format('d/m/Y')
                    : '',
                'depart_date' => $request->departure_date
                    ? Carbon::parse($request->departure_date)->format('d/m/Y')
                    : '',
                'total'      => $request->total,
                'remarks'    => $request->remarks,
                'bank_account_name' => $request->bank_account_name,
                'bank_name' => $request->bank_name,
                'bank_branch' => $request->bank_branch,
                'bank_account_number' => $request->bank_account_number,
                'bank_iban' => $request->bank_iban,
                'bank_swift' => $request->bank_swift,
                'info_invoice' => $request->info_invoice,
                'sumber' => $request->sumber,
                 'company_logo' => $logoUrl
                ? '<img src="'.$logoUrl.'" style="max-height:80px;">'
                : '',
                'url_web' => $request->url_web,
            ]);
            $profit = str_replace(['SAR', ',', ' '], '', $request->profit);
            $profit = number_format((float)$profit, 2, '.', '');
            $invoice = Invoice::create([
            'master_invoice_id' => $request->master_invoice_id,
            'invoice_no'        => 'INV-' . now()->format('Ymd') . '-' . strtoupper(Str::random(4)),
            'res_no'            => $resNo,

            'date'              => $request->date,
            'to'                => $request->to,
            'from'              => $request->from,
            'guest_name'        => $request->guest_name,
            'hotel_name'        => $request->hotel_name,

            'total'          => $request->total,
            'remarks'           => $request->remarks,

            'bank_account_name' => $request->bank_account_name,
            'bank_name'         => $request->bank_name,
            'bank_branch'       => $request->bank_branch,
            'bank_account_number' => $request->bank_account_number,
            'bank_iban'         => $request->bank_iban,
            'bank_swift'        => $request->bank_swift,

            'info_invoice'      => $request->info_invoice,
            'profit'            => $profit,
            'sumber'            => $request->sumber,
            'url_web'           => $request->url_web,

            'content'           => $finalContent,
            'created_by'        => auth()->id(),
        ]);


            return response()->json([
                'success'=>true,
                'type'=>'success',
                'title'=>'Berhasil',
                'message'=>'Invoice berhasil dibuat',
                'id'=>$invoice->id
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success'=>false,
                'type'=>'error',
                'title'=>'Gagal',
                'message'=>$e->getMessage()
            ],500);
        }
    }

    /* =====================
       UPDATE
       ===================== */
    public function update(Request $request, $id)
    {
        try {
            $invoice = Invoice::findOrFail($id);

            $invoice->update([
                'guest_name'=>$request->guest_name,
                'hotel_name'=>$request->hotel_name,
                'content'=>$request->content,
            ]);

            return response()->json([
                'success'=>true,
                'type'=>'success',
                'title'=>'Updated',
                'message'=>'Invoice berhasil diupdate'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success'=>false,
                'type'=>'error',
                'title'=>'Gagal',
                'message'=>$e->getMessage()
            ],500);
        }
    }


    public function edit($id)
    {
        return view('invoices.edit', [
            'invoice'=>Invoice::findOrFail($id)
        ]);
    }


    public function print($id)
    {
        return view('invoices.print', [
            'invoice' => Invoice::findOrFail($id)
        ]);
    }
    public function getTemplate($id)
    {
        $template = MasterInvoice::findOrFail($id);
        return response()->json([
            'content' => $template->content
        ]);
    }

    public function destroy($id)
    {
        try {
            $invoice = Invoice::findOrFail($id);

            // optional: hapus file logo kalau ada
            if ($invoice->client_logo && \Storage::disk('public')->exists($invoice->client_logo)) {
                \Storage::disk('public')->delete($invoice->client_logo);
            }

            $invoice->delete();

            return response()->json([
                'success' => true,
                'type'    => 'success',
                'title'   => 'Berhasil',
                'message' => 'Invoice berhasil dihapus'
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

}