<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class AddMetodePembayaranToPengembaliansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::table('pengembalians', function (Blueprint $table) {
        //     $table->enum('metode_bayar', ['cash', 'transfer bank', 'internet banking', 'mobile banking', 'virtual account', 'online credit card', 'rekening bersama', 'payPal', 'e-money'])->nullable();
        // });
        DB::statement("ALTER TABLE `pengembalians` MODIFY  `metode_bayar` ENUM('cash', 'transfer bank', 'internet banking', 'mobile banking') NULL");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::table('pengembalians', function (Blueprint $table) {
        //     //
        // });
        DB::statement("ALTER TABLE `pengembalians` MODIFY  `metode_bayar` ENUM('transfer bank', 'internet banking', 'mobile banking') NULL");
    }
}
