<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenambahanSewasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penambahan_sewas', function (Blueprint $table) {
            $table->id();
            // $table->foreignId('pelepasan_kendaraans_id')->references('id')->on('pelepasan_kendaraans');
            $table->foreignId('kendaraans_id')->references('id')->on('kendaraans');
            $table->string('jumlah_hari', 3);
            $table->string('total_biaya', 50);
            $table->text('keterangan');
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
        Schema::dropIfExists('penambahan_sewas');
    }
}
