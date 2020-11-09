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
            $table->string('pemilik');
            $table->string('klasifikasi');
            $table->text('alamat_notelp');
            $table->string('jumlah_kamar');
            $table->string('jumlah_tempat_tidur');
            $table->string('jumlah_pekerja_laki');
            $table->string('jumlah_pekerja_perempuan');
            $table->string('jumlah_pekerja');
            $table->string('fasilitas');
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
