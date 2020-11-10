<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataBidangSalonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_bidang_salons', function (Blueprint $table) {
            $table->id();
            $table->string('nama_tempat_usaha');
            $table->string('nama_pemilik')->nullable();
            $table->string('alamat_notelp')->nullable();
            $table->text('jumlah_pria')->nullable();
            $table->string('jumlah_wanita')->nullable();
            $table->string('jumlah_total')->nullable();
            $table->string('keterangan')->nullable();
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
        Schema::dropIfExists('data_bidang_salons');
    }
}
