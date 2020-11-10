<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSertifikasiProfesisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sertifikasi_profesis', function (Blueprint $table) {
            $table->id();
            $table->string('tanggal')->nullable();
            $table->string('tuk')->nullable();
            $table->string('provinsi')->nullable();
            $table->text('pendidikan')->nullable();
            $table->string('industri')->nullable();
            $table->string('grand_total')->nullable();
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
        Schema::dropIfExists('sertifikasi_profesis');
    }
}
