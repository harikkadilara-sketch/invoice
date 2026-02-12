<?php

use App\Http\Controllers\{
    DashboardController,
    InvoiceController,
    ClientController,
    PaymentController,
    UserController,
    CompanyController,
    MenuController,
    InvoiceTemplateController,
    InvoiceTemplateSectionController,
    InvoiceTemplateFieldController,
    MasterInvoiceController
};

Route::get('/', fn () => redirect()->route('login'));
require __DIR__.'/auth.php';

/*
|--------------------------------------------------------------------------
| API (AUTH)
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->get(
    'api/invoice-templates/{template}/config',
    [InvoiceTemplateController::class, 'config']
);

/*
|--------------------------------------------------------------------------
| AUTHENTICATED AREA
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'session.timeout'])->group(function () {

    /*
    |--------------------------------------------------------------------------
    | DASHBOARD
    |--------------------------------------------------------------------------
    */
    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

    /*
    |--------------------------------------------------------------------------
    | INVOICE & PAYMENT
    |--------------------------------------------------------------------------
    */
    Route::get('/fpdi-test', function () {
        $pdf = new \setasign\Fpdi\Fpdi();
        $pdf->AddPage();
        $pdf->SetFont('Helvetica','',12);
        $pdf->Write(10,'FPDI OK');
        return response($pdf->Output('S'))
            ->header('Content-Type','application/pdf');
    });
    // Invoice CRUD
    Route::resource('invoices', InvoiceController::class);
    Route::get('/invoices/{id}/print', [InvoiceController::class, 'print'])
    ->name('invoices.print');


    // ambil konten master template (AJAX)
    Route::get(
        'masterinvoice/{id}/content',
        [MasterInvoiceController::class, 'getContent']
    )->name('masterinvoice.content');

    Route::get('invoice-template/{id}', [InvoiceController::class, 'getTemplate']);

    Route::get('invoices/{invoice}/edit', [InvoiceController::class, 'edit'])->name('invoices.edit');
    Route::put('invoices/{invoice}', [InvoiceController::class, 'update'])->name('invoices.update');

    
    Route::post('/invoices/preview',[InvoiceController::class,'preview'])
    ->name('invoices.preview');

Route::get('/invoices/{invoice}/pdf',[InvoiceController::class,'pdf'])
    ->name('invoices.pdf');

    Route::post('payments', [PaymentController::class, 'store'])
        ->name('payments.store');
        
   Route::resource('clients', ClientController::class)->except(['create','edit']);
        Route::resource('companies', CompanyController::class)->except(['create','edit']);
    /*
    |--------------------------------------------------------------------------
    | ADMIN AREA
    |--------------------------------------------------------------------------
    */
    Route::middleware('role:admin')->group(function () {

        /*
        |--------------------------------------------------------------------------
        | MASTER DATA
        |--------------------------------------------------------------------------
        */
        Route::resource('users', UserController::class)->except(['create','edit']);
        
        Route::resource('menus', MenuController::class)->except(['create','edit']);

        Route::resource('masterinvoice', MasterInvoiceController::class);


        /*
        |--------------------------------------------------------------------------
        | INVOICE TEMPLATE - MASTER
        |--------------------------------------------------------------------------
        */
        Route::get('invoice-templates',
            [InvoiceTemplateController::class,'index'])
            ->name('invoice-templates.index');

        Route::post('invoice-templates',
            [InvoiceTemplateController::class,'store']);

        Route::get('invoice-templates/{invoiceTemplate}',
            [InvoiceTemplateController::class,'show']);

        Route::put('invoice-templates/{invoiceTemplate}',
            [InvoiceTemplateController::class,'update']);

        Route::delete('invoice-templates/{invoiceTemplate}',
            [InvoiceTemplateController::class,'destroy']);

        /*
        |--------------------------------------------------------------------------
        | INVOICE TEMPLATE - LIST PAGE (UNTUK SIDEBAR)
        |--------------------------------------------------------------------------
        */
        Route::get('invoice-template-sections',
            [InvoiceTemplateSectionController::class,'list'])
            ->name('invoice-template-sections.list');

        Route::get('invoice-template-fields',
            [InvoiceTemplateFieldController::class,'list'])
            ->name('invoice-template-fields.list');

        /*
        |--------------------------------------------------------------------------
        | INVOICE TEMPLATE - DETAIL (PER TEMPLATE)
        |--------------------------------------------------------------------------
        */
        Route::get('invoice-templates/{template}/sections',
            [InvoiceTemplateSectionController::class,'index'])
            ->name('invoice-template-sections.index');

        Route::get('invoice-templates/{template}/fields',
            [InvoiceTemplateFieldController::class,'index'])
            ->name('invoice-template-fields.index');

        Route::post('invoice-templates/{template}/sections',
            [InvoiceTemplateSectionController::class,'store']);

        Route::post('invoice-templates/{template}/fields',
            [InvoiceTemplateFieldController::class,'store']);

        Route::post('invoice-template-sections/reorder',
            [InvoiceTemplateSectionController::class,'reorder']);

        Route::post('invoice-template-fields/reorder',
            [InvoiceTemplateFieldController::class,'reorder']);

        Route::delete('invoice-template-fields/{field}',
            [InvoiceTemplateFieldController::class,'destroy']);
    });
});