<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TransaksiMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi', function (Blueprint $table) {
            $table->increments('id_transaksi');
            $table->integer('id_pemesanan')->unsigned();
            $table->foreign('id_pemesanan')->references('id_pemesanan')->on('pemesanan');
            $table->integer('id_bank')->unsigned();
            $table->foreign('id_bank')->references('id_bank')->on('bank');
            $table->string('total_harga');
            $table->string('tanggal_transaksi');
            $table->string('jenis_transaksi');
            $table->string('status');
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
        Schema::dropIfExists('transaksi');
    }
}
