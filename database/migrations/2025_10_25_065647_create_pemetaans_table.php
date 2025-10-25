<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePemetaansTable extends Migration
{
    public function up()
    {
        Schema::create('pemetaans', function (Blueprint $table) {
            $table->id();
            $table->string('nama');                     // Nama lokasi
            $table->string('jalan_diperbaiki')->nullable(); // Jalan yang diperbaiki
            $table->decimal('panjang_jalan', 7, 2)->nullable();
            $table->decimal('lebar_jalan', 5, 2)->nullable();   // Lebar jalan (meter)
            $table->string('pt')->nullable();                // Nama PT (kontraktor)
            $table->text('data_pembangunan')->nullable(); // Data pembangunan
            $table->string('rt')->nullable();           // RT
            $table->string('rw')->nullable();           // RW
            $table->decimal('latitude', 10, 7)->nullable();   // Titik peta - latitude
            $table->decimal('longitude', 10, 7)->nullable();  // Titik peta - longitude
            $table->string('dokumen')->nullable();      // File dokumen/foto
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pemetaans');
    }
}
