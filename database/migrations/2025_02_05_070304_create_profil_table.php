<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilTable extends Migration
{
    public function up()
    {
        Schema::create('profil', function (Blueprint $table) {
            $table->id('id_profil');
            $table->string('first_name', 50)->nullable(false);
            $table->string('last_name', 50)->nullable();
            $table->string('email', 100)->unique()->nullable(false);
            $table->text('alamat')->nullable();
            $table->string('phoneNumber', 20)->nullable();
            $table->string('jobStatus', 50)->nullable();
            $table->string('kota', 50)->nullable();
            $table->string('profilpic', 255)->nullable(); // Path atau URL gambar profil
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('profil');
    }
}