<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTargetTable extends Migration
{
    public function up()
    {
        Schema::create('target', function (Blueprint $table) {
            $table->id(); // unsignedBigInteger
            $table->decimal('total_finansial', 15, 2)->nullable(false);
            $table->decimal('total_pengeluaran', 15, 2)->nullable(false);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('target');
    }
}