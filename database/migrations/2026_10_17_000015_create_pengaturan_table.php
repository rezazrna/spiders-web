<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

// Nilai yang bisa diubah manajemen tanpa mengubah kode: rekening tujuan, No. WhatsApp admin, alamat GOR, tanggal jatuh tempo. (K5, K7, K11)
return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pengaturan', function (Blueprint $table) {
            $table->string('kunci', 50)->primary();
            $table->text('nilai'); // text: cerita Tentang klub bisa sampai 600 karakter
            $table->timestamp('updated_at')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pengaturan');
    }
};
