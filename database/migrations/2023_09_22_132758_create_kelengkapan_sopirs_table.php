<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKelengkapanSopirsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kelengkapan_sopirs', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('sopirs_id')->index();
            $table->enum('ktp', ['lengkap', 'belum lengkap']);
            $table->enum('sim', ['lengkap', 'belum lengkap']);
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
        Schema::dropIfExists('kelengkapan_sopirs');
    }
}
