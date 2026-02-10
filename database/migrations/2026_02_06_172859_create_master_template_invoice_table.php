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
        Schema::create('master_template_invoice', function (Blueprint $table) {
            $table->id();
            $table->string('name');                 // Nama template (ex: Invoice Modern)
            $table->string('code')->unique();        // Kode unik (INV-MODERN)
            $table->text('description')->nullable();
            $table->longText('content');             // HTML dari TinyMCE
            $table->boolean('is_active')->default(true);
            $table->foreignId('created_by')->constrained('users');
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('master_template_invoice');
    }
};