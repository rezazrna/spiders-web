<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// Database lama: kolom nilai masih VARCHAR(255), padahal cerita Tentang klub bisa sampai 600 karakter.
// MySQL menolak teks yang lebih panjang ("Data too long for column 'nilai'"); SQLite tidak, jadi tidak tertangkap test.
// Dijalankan sebelum migrasi 2026_10_26 yang mengisi cerita tersebut.
return new class extends Migration
{
    public function up(): void
    {
        Schema::table('pengaturan', function (Blueprint $table) {
            $table->text('nilai')->change();
        });
    }

    public function down(): void
    {
        Schema::table('pengaturan', function (Blueprint $table) {
            $table->string('nilai', 255)->change();
        });
    }
};
