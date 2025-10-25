<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKecamatansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('kecamatans', function (Blueprint $table) {
            $table->id();
            $table->string('nama');                     // Nama kecamatan
            $table->text('jalan_diperbaiki')->nullable(); // Jalan yang diperbaiki
            $table->decimal('panjang_jalan', 8, 2)->nullable(); // Panjang jalan (meter)
            $table->decimal('lebar_jalan', 5, 2)->nullable();   // Lebar jalan (meter)
            $table->text('data_pembangunan')->nullable(); // Data pembangunan
            $table->string('rt')->nullable();           // RT
            $table->string('rw')->nullable();           // RW
            $table->string('dokumen')->nullable();      // File dokumen/foto
            $table->timestamps();
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kecamatans');
    }
}
