<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePelepasanPemesanansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pelepasan_pemesanans', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('pemesanans_id')->index();
            $table->bigInteger('kendaraans_id')->index();
            $table->string('foto_dokumen');
            $table->string('foto_kendaraan');
            $table->string('foto_pelanggan');
            $table->string('kilometer_keluar');
            $table->string('bensin_keluar');
            $table->date('tanggal_diambil');
            $table->date('tanggal_kembali');
            $table->enum('sarung_jok', ['ada', 'tidak ada', 'kosong']);
            $table->enum('karpet', ['ada', 'tidak ada', 'kosong']);
            $table->enum('kondisi_kendaraan', ['ada', 'tidak ada', 'kosong']);
            $table->enum('ban_serep', ['ada', 'tidak ada', 'kosong'])->nullable();
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
        Schema::dropIfExists('pelepasan_pemesanans');
    }
}
