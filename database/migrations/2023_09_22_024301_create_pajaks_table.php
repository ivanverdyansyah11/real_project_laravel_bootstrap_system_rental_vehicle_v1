<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePajaksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pajaks', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('kendaraans_id')->index();
            $table->enum('jenis_pajak', ['samsat', 'angsuran', 'ganti nomor polisi']);
            $table->date('tanggal_bayar');
            $table->integer('lama_pajak');
            $table->string('metode_bayar');
            $table->string('jumlah_bayar');
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
        Schema::dropIfExists('pajaks');
    }
}
