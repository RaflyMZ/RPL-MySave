<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengeluaranTable extends Migration
{
    public function up()
    {
        Schema::create('pengeluaran', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id('id_pengeluaran');
            $table->date('tenggat_pengeluaran')->nullable(false);
            $table->string('nama_pengeluaran', 100)->nullable(false);
            $table->decimal('nominal', 15, 2)->nullable(false);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pengeluaran');
    }
}