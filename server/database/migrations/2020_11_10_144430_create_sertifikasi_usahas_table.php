<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSertifikasiUsahasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sertifikasi_usahas', function (Blueprint $table) {
            $table->id();
            $table->string('nama_klien')->nullable();
            $table->string('permohonan')->nullable();
            $table->string('kajian')->nullable();
            $table->text('perjanjian')->nullable();
            $table->string('lap_audit_s2')->nullable();
            $table->string('sertifikat')->nullable();
            $table->string('lap_audit_sury')->nullable();
            $table->string('klasifikasi_bintang')->nullable();
            $table->string('lsu_auditor')->nullable();
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
        Schema::dropIfExists('sertifikasi_usahas');
    }
}
