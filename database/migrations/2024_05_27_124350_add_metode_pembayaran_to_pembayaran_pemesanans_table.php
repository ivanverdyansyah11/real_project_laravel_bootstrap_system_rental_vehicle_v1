<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class AddMetodePembayaranToPembayaranPemesanansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pembayaran_pemesanans', function (Blueprint $table) {
            $table->string('metode_bayar')->nullable()->change();
        });

        DB::statement("ALTER TABLE `pembayaran_pemesanans` MODIFY `metode_bayar` ENUM('cash', 'transfer bank', 'internet banking', 'mobile banking', 'virtual account', 'online credit card', 'rekening bersama', 'payPal', 'e-money') NULL");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pembayaran_pemesanans', function (Blueprint $table) {
            $table->string('metode_bayar')->nullable()->change();
        });

        DB::statement("ALTER TABLE `pembayaran_pemesanans` MODIFY `metode_bayar` ENUM('transfer bank', 'internet banking', 'mobile banking') NULL");
    }
}
