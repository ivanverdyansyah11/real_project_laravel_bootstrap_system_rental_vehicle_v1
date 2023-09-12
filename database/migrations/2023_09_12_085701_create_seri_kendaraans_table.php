<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeriKendaraansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seri_kendaraans', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('jenis_kendaraan_id');
            $table->bigInteger('brand_kendaraan_id');
            $table->string('nomor', 25);
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
        Schema::dropIfExists('seri_kendaraans');
    }
}
