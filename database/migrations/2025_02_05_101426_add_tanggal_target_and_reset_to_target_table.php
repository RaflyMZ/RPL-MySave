<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTanggalTargetAndResetToTargetTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('target', function (Blueprint $table) {
            $table->date('tanggal_target')->nullable(false); // Kolom baru untuk tanggal target
            $table->boolean('reset')->default(0); // Kolom baru untuk flag reset (default: 0)
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('target', function (Blueprint $table) {
            $table->dropColumn('tanggal_target'); // Menghapus kolom jika rollback
            $table->dropColumn('reset');         // Menghapus kolom jika rollback
        });
    }
}