<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKelengkapanPelanggansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kelengkapan_pelanggans', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('pelanggans_id')->index();
            $table->enum('ktp', ['lengkap', 'belum lengkap']);
            $table->enum('kk', ['lengkap', 'belum lengkap']);
            $table->enum('nomor_telepon', ['lengkap', 'belum lengkap']);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kelengkapan_pelanggans');
    }
}
