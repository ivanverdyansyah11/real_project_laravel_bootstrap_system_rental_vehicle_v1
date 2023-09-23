<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKelengkapanPemesanansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kelengkapan_pemesanans', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('pemesanans_id')->index();
            $table->enum('jenis_kendaraan', ['lengkap', 'belum lengkap']);
            $table->enum('nama_pemesan', ['lengkap', 'belum lengkap']);
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
        Schema::dropIfExists('kelengkapan_pemesanans');
    }
}
