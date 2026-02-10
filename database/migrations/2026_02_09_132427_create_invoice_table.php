<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('invoices', function (Blueprint $table) {
    $table->id();

    $table->foreignId('master_invoice_id')
          ->constrained('master_template_invoice')
          ->cascadeOnDelete();

    $table->string('invoice_no')->unique();
    $table->string('res_no')->unique();

    $table->date('date')->nullable();
    $table->string('to')->nullable();
    $table->string('from')->nullable();

    $table->string('guest_name')->nullable();
    $table->string('hotel_name')->nullable();

    $table->longText('content'); // 🔥 hasil render TinyMCE

    // 🔽 DATA TAMBAHAN (yang kamu render)
    $table->string('currency')->nullable();
    $table->text('remarks')->nullable();

    $table->string('bank_account_name')->nullable();
    $table->string('bank_name')->nullable();
    $table->string('bank_branch')->nullable();
    $table->string('bank_account_number')->nullable();
    $table->string('bank_iban')->nullable();
    $table->string('bank_swift')->nullable();

    $table->string('info_invoice')->nullable();
    $table->decimal('profit', 15, 2)->nullable();
    $table->string('sumber')->nullable();
    $table->string('url_web')->nullable();

    $table->unsignedBigInteger('created_by');

    $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoice');
    }
};