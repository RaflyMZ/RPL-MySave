<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFinansialTable extends Migration
{
    public function up()
    {
        Schema::create('finansial', function (Blueprint $table) {
            $table->id('id_finansial');
            $table->string('sumber', 100)->nullable(false);
            $table->date('tanggal_pemasukan')->nullable(false);
            $table->decimal('penghasilan', 15, 2)->nullable(false);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('finansial');
    }
}