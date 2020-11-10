<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataBidangHotelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_bidang_hotels', function (Blueprint $table) {
            $table->id();
            $table->string('nama_usaha');
            $table->string('pemilik')->nullable();
            $table->string('klasifikasi')->nullable();
            $table->text('alamat_notelp')->nullable();
            $table->string('jumlah_kamar')->nullable();
            $table->string('jumlah_tempat_tidur')->nullable();
            $table->string('jumlah_pekerja_laki')->nullable();
            $table->string('jumlah_pekerja_perempuan')->nullable();
            $table->string('fasilitas')->nullable();
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
        Schema::dropIfExists('data_bidang_hotels');
    }
}
