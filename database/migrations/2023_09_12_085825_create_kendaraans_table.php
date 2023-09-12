<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKendaraansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kendaraans', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('jenis_kendaraan_id');
            $table->bigInteger('brand_kendaraan_id');
            $table->bigInteger('seri_kendaraan_id');
            $table->bigInteger('kategori_km');
            $table->string('foto');
            $table->string('nomor_polisi', 50);
            $table->string('kilometer', 50);
            $table->string('tarif_sewa', 50);
            $table->string('tahun_pembuatan', 25);
            $table->date('tanggal_pembelian');
            $table->string('warna', 25);
            $table->string('nomor_rangka', 25);
            $table->string('nomor_mesin', 25);
            $table->string('stnk_nama');
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
        Schema::dropIfExists('kendaraans');
    }
}
