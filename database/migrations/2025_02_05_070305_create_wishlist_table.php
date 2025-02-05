<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWishlistTable extends Migration
{
    public function up()
    {
        Schema::create('wishlist', function (Blueprint $table) {
            $table->id('id_wishlist');
            $table->string('nama_wishlist', 100)->nullable(false);
            $table->decimal('nominal_wishlist', 15, 2)->nullable(false);
            $table->date('tanggal_wishlist')->nullable(false);
            $table->text('alasan')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('wishlist');
    }
}