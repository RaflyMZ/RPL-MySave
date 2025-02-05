<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTargetTabunganToTargetTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('target', function (Blueprint $table) {
            $table->decimal('target_tabungan', 15, 2)->nullable(false); // Kolom baru untuk target tabungan
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('target', function (Blueprint $table) {
            $table->dropColumn('target_tabungan'); // Menghapus kolom jika rollback
        });
    }
}